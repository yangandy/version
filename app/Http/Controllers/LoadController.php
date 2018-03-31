<?php

namespace App\Http\Controllers;

use App\Config;
use App\Part;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


use Illuminate\Support\Facades\File;

class LoadController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function Index(){

        return view('load.index');
    }
    public function newdll(){

        $parts = Part::All();
        return  view('load.newdll',['parts' => $parts]);

    }
    public function newpart(){
        return view('load.newpart');
    }

    /**
     * @param Request $request
     */
    public function savedll(Request $request){
       // dd($request);
        if ($request->isMethod('post')) {
            // dd($request->file());
            $file = $request->file('file');
            // 文件是否上传成功
            if ($file->isValid()) {
                // 获取文件相关信息

                $originalName = $file->getClientOriginalName();

                $realPath = $file->getRealPath();   //临时文件的绝对路径

                // 上传文件
                $savepath=$originalName;
                $filename = $originalName;

                // 使用我们新建的uploads本地存储空间（目录）
                $add= Part::where('id',$request->input('part'))->get()->first();
                $partname=$add->name;
                Storage::disk('local')->put($originalName, file_get_contents($realPath));
            }
            else{
                redirect('newdll');
            }


               $bool= copy("C:/xampp/htdocs/version/public/uploads/$filename",
                    "C:/xampp/htdocs/version/public/$partname/$filename");
                    $myfile = fopen("$partname/log.txt", "a");


                    $txt = "-------------------------更新内容---------------------------\r\n
 asdasdasd\r\n
asdasdasd\r\n
asdasdasd\r\n
asdasdasd\r\n
asdasdasd\r\n
                asdasdasdasd\r\n
                asdasdasdas\r\n
                asdasdasad\r\n
                s时间 2017.7.8-----------------------------------------\r\n



                \r\n";
                    fwrite($myfile, $txt);
                    fclose($myfile);


//                else
//                {$bool= copy("C:/xampp/htdocs/version/public/uploads/$filename",
//                    "C:/xampp/htdocs/version/public/publi/$filename");}


                $part=Config::where('name',$filename)->first();
                if(!$part){
                $part= new Config();
                $part->name=$filename;
                $part->version=$request->input('version');
                $part->auth=$request->input('auth');
                $part->pid=$request->input('part');
                $part->type=$request->input('type');
                $part->save();}
                else{
                    $part->version=$request->input('version');

                    $part->save();
                }


            }
            return redirect('/index');
        }



    public function savepart(Request $request){

        if ($request->isMethod('post')) {
            // dd($request->file());
            $file = $request->file('file');
            // 文件是否上传成功
            if ($file->isValid()) {
                // 获取文件相关信息
                $originalName = $file->getClientOriginalName();
                if(file_exists($originalName))
                {}//创建文件夹
                else
                {
                    $dir = mkdir(iconv('utf-8', 'gbk', "$originalName"));
                }
                $originalName = iconv('utf-8', 'gbk', $originalName);// 文件原名
                // $ext = $file->getClientOriginalExtension();     // 扩展名
                $realPath = $file->getRealPath();   //临时文件的绝对路径

                // 上传文件
                $filename = $originalName;

                // 使用我们新建的uploads本地存储空间（目录）

                    if(Storage::disk('local')->put($filename, file_get_contents($realPath)))
                    {$bool= copy("C:/xampp/htdocs/version/public/uploads/$filename",
                        "C:/xampp/htdocs/version/public/$filename/$filename");}
                else
                {echo "储存.$filename.失败";}


//                $file="C:/xampp/htdocs/version/public/$filename/$filename";
//                $p=stat($file);
//                print_r($p);
//                exit;


$myfile = fopen("$filename/log.txt", "a");
$txt = "-------------------------更新内容---------------------------\r\n
$filename\r\n
asdasdasd\r\n
asdasdasd\r\n
asdasdasd\r\n
时间 2017.7.8-----------------------------------------\r\n";
                fwrite($myfile, $txt);
                fclose($myfile);

                $part=Part::where('name',$filename)->first();
                if(!$part){
                $part= new Part();
                $part->name=$filename;
                $part->version=$request->input('version');
                $part->configpath="1.1.1.1:9999/public/$filename";
                $part->auth=$request->input('auth');
                $part->logpath="1.1.1.1:9999/public/$filename";
                $part->save();}
                else{
                    $part->version=$request->input('version');
                    $part->auth=$request->input('auth');
                    $part->save();
                }
                $parts = Part::All();
                return  redirect('/index');

            }
        }
    }
    public function delpart($id){

        $part=Part::where('id',$id)->first();
        $name=$part->name;
        unlink("C:/xampp/htdocs/version/public/$name/$name");
        $part=Part::destroy('id',$id);
        $dll=Config::where('pid',$id)->get();
        foreach($dll as $d){
            $dname=$d->name;
            unlink("C:/xampp/htdocs/version/public/$name/$dname");
            Config::destroy('id',$d->id);
        }

       return redirect('index');

    }
    public function deldll($id){

        $dll=Config::where('id',$id)->first();
        $name=Part::where('id',$dll->pid)->first()->name;

        unlink("C:/xampp/htdocs/version/public/$name/$dll->name");
        $part=Config::destroy('id',$id);
        return redirect('dll');

    }
    public function alldll(){
        $dlls=Config::all();
        return view('main.alldll',['parts'=>$dlls]);
    }



}
