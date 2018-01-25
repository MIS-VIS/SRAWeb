<?php

namespace App\Libraries;
use Route;


class ContentHelper{



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
                            <a href="'.$link1.'" class="btn btn-secondary fuse-ripple-ready" role="button" data-dismiss="modal">Back</a>
                            <a href="'.$link2.'" class="btn btn-warning fuse-ripple-ready" role="button"><span style="color:white;">Go to My List</span></a>
                            <a href="'.$link3.'" class="btn btn-success fuse-ripple-ready" role="button"><span style="color:white;">Print</span></a>
                        </div>
                    </div>
                </div>
            </div>';
    }




}