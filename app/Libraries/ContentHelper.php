<?php

namespace App\Libraries;
use Route;


class ContentHelper{


    public static function openCont($containerType, $icon, $title, $variable, $value, $id, $routeList, $routeEdit, $routeAdd){
        if($containerType == 'carded1'){
            return '<div class="page-layout carded full-width" id="'.$id.'">
                        <div class="top-bg bg-blue"></div>
                            <div class="page-content">
                                <div class="header bg-blue text-auto row no-gutters align-items-center justify-content-between">
                                    <div class="col-12 col-sm">
                                        <div class="logo row no-gutters align-items-start">
                                            <div class="logo-icon mr-3 mt-1">
                                                <i class="'.$icon.'"></i>
                                            </div>
                                            <div class="logo-text">
                                                <div class="h4">'.$title.'</div>
                                                <div class="">'.$variable.' '.$value.'</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <a href="'. $routeList .'" class="btn btn-secondary fuse-ripple-ready">
                                            <i style="font-size:15px;" class="icon icon-file-multiple"></i> Go to My List
                                        </a>
                                    </div>
                                </div>';
        }else if($containerType == 'carded2'){
            return '<div class="page-layout carded full-width" id="'.$id.'" onload="">
                        <div class="top-bg bg-blue"></div>
                            <div class="page-content">
                                <div class="header bg-blue text-auto row no-gutters align-items-center justify-content-between">
                                    <div class="col-12 col-sm">
                                        <div class="logo row no-gutters align-items-start">
                                            <div class="logo-icon mr-3 mt-1">
                                                <i class="'.$icon.'"></i>
                                            </div>
                                            <div class="logo-text">
                                                <div class="h4">'.$title.'</div>
                                                <div class="">'.$variable.' '.$value.'</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <a href="'. $routeEdit .'" class="btn btn-secondary fuse-ripple-ready">
                                            <i style="font-size:15px;" class="icon icon-border-color"></i> Edit
                                        </a>
                                        <a href="'. $routeList .'" class="btn btn-secondary fuse-ripple-ready">
                                            <i style="font-size:15px;" class="icon icon-file-multiple"></i> Go to My List
                                        </a>
                                        <a href="'. $routeAdd .'" class="btn btn-secondary fuse-ripple-ready">
                                            <i style="font-size:20px;" class="icon icon-playlist-plus"></i> Add Again
                                        </a>
                                    </div>
                                </div>';
        }else if($containerType == 'simple1'){
            return '<div class="page-layout simple tabbed" id="'.$id.'">
                        <div class="header bg-blue text-auto row no-gutters align-items-center justify-content-between p-6">
                            <div class="row no-gutters align-items-center">
                                <div class="logo-icon mr-3 mt-1">
                                    <i class="'.$icon.'"></i>
                                </div>
                                <div class="logo-text">
                                    <div class="h4">'.$title.'</div>
                                    <div class="">'.$variable.' '.$value.'</div>
                                </div>
                            </div>
                            <div class="class="col-auto"">
                                <a href="'. $routeAdd .'" class="btn btn-secondary fuse-ripple-ready">
                                    <i style="font-size:20px;" class="icon icon-playlist-plus"></i> New
                                </a>
                            </div>
                        </div>';
        }else if($containerType == 'simple2'){
            return '<div class="page-layout simple tabbed" id="'.$id.'">
                        <div class="header bg-blue text-auto row no-gutters align-items-center justify-content-between p-6">
                            <div class="row no-gutters align-items-center">
                                <div class="logo-icon mr-3 mt-1">
                                    <i class="'.$icon.'"></i>
                                </div>
                                <div class="logo-text">
                                    <div class="h4">'.$title.'</div>
                                    <div class="">'.$variable.' '.$value.'</div>
                                </div>
                            </div>
                        </div>';
        }
    }




    public static function closeCont($containerType){
    	if($containerType == 'carded'){
            return '</div></div></div>';
        }
        return '</div>';
        
    }




    public static function openCard($containerType, $id){
        if($containerType == 'carded'){
            return '<div class="page-content-card" id="'.$id.'">
                            <div class="p-5 col-12">';
        }
        return '<div class="page-content row p-6 id="'.$id.'">
                    <div class="col-12">
                        <div class="card">';  
    }




    public static function closeCard($containerType){
        if($containerType == 'carded'){
            return '</div></div><br><br><br><br><br><br>';
        }
        return '</div></div></div><br><br><br><br><br><br>';  
    }




    public static function openInCard($class, $title, $subtitle, $id){
      return '<div class="'. $class .'" id="'.$id.'">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">'. $title .'</h4>
                            <h6 class="card-subtitle mb-2 text-muted">'. $subtitle .'</h6>
                        ';
    }
    



    public static function closeInCard(){
      return'</div></div></div>';
    }




    public static function loader($id){
      return'<div class="page-overlay" id="'.$id.'">
                <div class="spinner">
                    <div class="circle1"></div>
                    <div class="circle2"></div>
                </div>
            </div>';
    }
    



    public static function modalConfirmAdd($id, $title , $content, $link1, $link2, $link3){
      return'<div id="'.$id.'" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLiveLabel">'. $title .'</h5>
                        </div>
                        <div class="modal-body">
                            <span style="font-size:17px;">'.$content.'</span>
                        </div>
                        <div class="modal-footer">
                            <a href="'.$link1.'" class="btn btn-secondary fuse-ripple-ready" role="button">Add again</a>
                            <a href="'.$link2.'" class="btn btn-warning fuse-ripple-ready" role="button"><span style="color:white;">Go to List</span></a>
                            <a href="'.$link3.'" class="btn btn-success fuse-ripple-ready" role="button"><span style="color:white;">Print</span></a>
                        </div>
                    </div>
                </div>
            </div>';
    }




    public static function modalConfirmUpdate($id, $title , $content, $link1, $link2, $link3){
      return'<div id="'.$id.'" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLiveLabel">'. $title .'</h5>
                        </div>
                        <div class="modal-body">
                            <span style="font-size:17px;">'. $content .'</span>
                        </div>
                        <div class="modal-footer">
                            <a href="'.$link1.'" class="btn btn-secondary fuse-ripple-ready" role="button" data-dismiss="modal">Cancel</a>
                            <a href="'.$link2.'" class="btn btn-warning fuse-ripple-ready" role="button"><span style="color:white;">Go to My List</span></a>
                            <a href="'.$link3.'" class="btn btn-success fuse-ripple-ready" role="button"><span style="color:white;">Print</span></a>
                        </div>
                    </div>
                </div>
            </div>';
    }




}