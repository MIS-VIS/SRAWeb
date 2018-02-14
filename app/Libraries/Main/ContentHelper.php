<?php

namespace App\Libraries\Main;

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
    




    public static function modalPrint($id, $title , $content, $link){

      return'<div id="'.$id.'" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLiveLabel"> '. $title .'</h5>
                        </div>
                        <div class="modal-body">
                            <span style="font-size:17px;">'.$content.'</span>
                        </div>
                        <div class="modal-footer">
                            <a href="" class="btn btn-secondary fuse-ripple-ready" role="button" data-dismiss="modal">Back</a>
                            <a href="'.$link.'" class="btn btn-success fuse-ripple-ready" role="button"><span style="color:white;">Print</span></a>
                        </div>
                    </div>
                </div>
            </div>';

    }






    public static function modalView($id, $title , $content, $link){

      return'<div id="'.$id.'" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLiveLabel"> '. $title .'</h5>
                        </div>
                        <div class="modal-body">
                            <span style="font-size:17px;">'.$content.'</span>
                        </div>
                        <div class="modal-footer">
                            <a href="" class="btn btn-secondary fuse-ripple-ready" role="button" data-dismiss="modal">Back</a>
                            <a href="'.$link.'" class="btn btn-success fuse-ripple-ready" role="button"><span style="color:white;">View</span></a>
                        </div>
                    </div>
                </div>
            </div>';

    }






    public static function modalDelete($id){

        return '<div id="'. $id .'" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
                    <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLiveLabel"><i class="icon-alert"></i> Confirmation</h5>
                                </div>
                                <div class="modal-body" id="delete_body">
                                    <form method="POST" accept-charset="UTF-8" id="form">
                                        <input name="_method" value="DELETE" type="hidden">
                                        '. csrf_field() .'
                                        <span style="font-size:17px;">Are you sure, you want to delete this record?</span>
                                        <div class="modal-footer">
                                            <a class="btn btn-secondary fuse-ripple-ready" role="button" data-dismiss="modal">Cancel</a>
                                            <button id="delete-btn" class="btn btn-danger fuse-ripple-ready" role="button">Delete</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                    </div>
                </div>';

    }







    public static function menuStatus($routeName, $status){

      return Route::currentRouteNamed($routeName) ? $status : '';
      
    }





}