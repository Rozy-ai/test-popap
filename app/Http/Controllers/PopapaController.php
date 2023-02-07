<?php

namespace App\Http\Controllers;

use App\Models\Popapa;
use App\Models\Script;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class PopapaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd($request);
        $popaps_1 = count(Popapa::where('status', '1')->get());
        $popaps_0 = count(Popapa::whereStatus('0')->get());

        $popaps = Popapa::orderBy('created_at', 'DESC')->paginate(10);

        if ($request->has('search')) {
            $popaps = Popapa::where('title', 'like', "%{$request->search}%")
                ->orwhere('content', 'like', "%{$request->search}%")
                ->orderBy('created_at', 'DESC')->paginate(10);
        }

        return view('backend.popapas.index', compact(
            'popaps',
            'popaps_1',
            'popaps_0',
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.popapas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);
        $popapa = Popapa::create($request->input());


        touch(public_path('scripts\script_' . $popapa->id . '.js'));
        // Создаём файл
        $file = public_path('scripts\script_' . $popapa->id . '.js');
        // Открываем файл для получения существующего содержимого
        $server_path = $request->server('REQUEST_SCHEME') . '://' . $request->server('SERVER_NAME') . '/scripts/script_' . $popapa->id . '.js';
        // dd($server_path);
        $current = file_get_contents($file);
        // Добавляем нового человека в файл
        $current .= "window.onload = addModalHtmlToBody;
         
        function addModalHtmlToBody() {
            let bodyElement = document.getElementsByTagName(`body`).item(0)
            bodyElement.innerHTML +=
                `<div id='myModal' class='modal' style='display: none;position: fixed;z-index: 1;padding-top: 100px;left: 0;top: 0;width: 100%;height: 100%;overflow: auto;background-color: rgb(0,0,0);background-color: rgba(0,0,0,0.4);'>` +
                `  <div class='modal-content' style='background-color: #fefefe;margin: auto;padding: 20px;border: 1px solid #888;width: 80%;font-size: 18px;font-family: Arial, sans - serif; animation: openModal .2s ease;'>` +
                `    <span class='close' style=' color: #aaaaaa;float: right;font-size: 28px;font-weight: bold;'>&times;</span>` +
                `    <h3>Modal title</h3>` +
                `    <div>` +
                `    Name : <strong>$popapa->title</strong><br>` +
                `    Content: <p><p>$popapa->content</p></p><br>` +
                `</div> ` +
                `  </div>` +
                `<style>.close:hover,.close:focus {color: #000;text-decoration: none;cursor: pointer;} @keyframes openModal{0%{transform: scale(0);}50%{transform: scale(.5); }100%{transform: scale(1);}}</style>` +
                `</div>`;
        
            let head = document.getElementsByTagName('HEAD')[0];
        
            let link = document.createElement('link');
        
            head.appendChild(link);
            setModalActions()
        }
        
        function setModalActions() {
        
            let modal = document.getElementById(`myModal`);
        
            modal.style.display = `block`;
            let span = document.getElementsByClassName(`close`)[0];
            span.onclick = function () {
                modal.style.display = `none`;
            }
            window.onclick = function (event) {
                if (event.target === modal) {
                    modal.style.display = `none`;
                }
            }
            setTimeout(increaseViewCount, 10000)
        }
        
        
        function increaseViewCount() {

            let xhttp;
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState === 4 && this.status === 200) {
        
                }
            };
            xhttp.open(`GET`, `{$request->server('REQUEST_SCHEME') }://{$request->server('SERVER_NAME')}/api/popapa-view/{$popapa->id}`, true);
            xhttp.send();
        }
        ";
        // Пишем содержимое обратно в файл
        file_put_contents($file, $current);

        Script::create([
            'popapa_id' => $popapa->id,
            'path_scripts' => $server_path,
        ]);

        return to_route('popapas.index')->with('message', 'Modal Successfuly Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Popapa $popapa)
    {
        return view('backend.popapas.show', compact('popapa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Popapa $popapa)
    {
        return view('backend.popapas.update', compact('popapa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Popapa $popapa)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $popapa->update($request->input());

        return to_route('popapas.index')->with('message', 'Modal Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Popapa $popapa)
    {
        $popapa->delete();

        return to_route('popapas.index')->with('message', 'Modal Successfully Deleted');
    }

    public function path_script($id)
    {
        $popapa = Popapa::find($id);

        return view('backend.popapas.path_script', compact('popapa'));
    }
}
