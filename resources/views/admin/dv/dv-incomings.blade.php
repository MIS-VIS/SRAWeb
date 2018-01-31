@extends('layout.admin-master')

@section('content')




        <div class="content">
            <div id="todo" class="page-layout carded left-sidebar">

    <div class="top-bg bg-blue"></div>

    <div class="page-content-wrapper">

        <aside class="page-sidebar" data-fuse-bar="todo-sidebar" data-fuse-bar-media-step="md">
            <!-- HEADER -->
<div class="header d-flex flex-column justify-content-between p-6 bg-secondary text-auto">

    <div class="logo d-flex align-items-center pt-7">
        <i class="icon-checkbox-marked mr-4"></i>
        <span class="logo-text h4">To-Do</span>
    </div>

    <div class="account">
        <div class="title">John Doe</div>
    </div>

</div>
<!-- / HEADER -->

<div>

    <div class="p-6">
        <button type="button" class="btn btn-secondary btn-block">ADD TASK</button>
    </div>

    <ul class="nav flex-column">

        <li class="nav-item">
            <a class="nav-link ripple" href="#">
                <i class="icon s-4 icon-view-headline"></i>
                <span>All Tasks</span>
            </a>
        </li>

        <li class="divider"></li>

        <li class="subheader">
            Filters
        </li>

        <li class="nav-item">
            <a class="nav-link ripple" href="#">
                <i class="icon s-4 icon-star"></i>
                <span>Starred</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link ripple" href="#">
                <i class="icon s-4 icon-alert-circle"></i>
                <span>Priority</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link ripple" href="#">
                <i class="icon s-4 icon-clock"></i>
                <span>Scheduled</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link ripple" href="#">
                <i class="icon s-4 icon-calendar-today"></i>
                <span>Today</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link ripple" href="#">
                <i class="icon s-4 icon-check"></i>
                <span>Done</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link ripple" href="#">
                <i class="icon s-4 icon-delete"></i>
                <span>Deleted</span>
            </a>
        </li>

        <li class="divider"></li>

        <li class="subheader">
            Tags
        </li>

        
            <li class="nav-item">
                <a class="nav-link ripple" href="#">
                    <i class="icon s-4 icon-label" style="color:#388E3C"></i>
                    <span>Frontend</span>
                </a>
            </li>
        
            <li class="nav-item">
                <a class="nav-link ripple" href="#">
                    <i class="icon s-4 icon-label" style="color:#F44336"></i>
                    <span>Backend</span>
                </a>
            </li>
        
            <li class="nav-item">
                <a class="nav-link ripple" href="#">
                    <i class="icon s-4 icon-label" style="color:#FF9800"></i>
                    <span>API</span>
                </a>
            </li>
        
            <li class="nav-item">
                <a class="nav-link ripple" href="#">
                    <i class="icon s-4 icon-label" style="color:#0091EA"></i>
                    <span>Issue</span>
                </a>
            </li>
        
            <li class="nav-item">
                <a class="nav-link ripple" href="#">
                    <i class="icon s-4 icon-label" style="color:#9C27B0"></i>
                    <span>Mobile</span>
                </a>
            </li>
        

    </ul>
</div>
        </aside>

        <!-- CONTENT -->
        <div class="page-content">
            <!-- HEADER -->
<div class="header d-flex flex-column justify-content-center bg-secondary text-auto">

    <div class="search-bar row align-items-center no-gutters bg-white text-auto">

        <button type="button" class="sidebar-toggle-button btn btn-icon d-block d-lg-none"
                data-fuse-bar-toggle="todo-sidebar">
            <i class="icon icon-menu"></i>
        </button>

        <i class="icon-magnify s-6 mx-4"></i>

        <input class="search-bar-input col" type="text" placeholder="Search for a task or tag"></div>

</div>
<!-- / HEADER -->

<div class="page-content-card">

    <!-- CONTENT TOOLBAR -->
    <div class="toolbar d-flex align-items-center justify-content-between p-4 p-sm-6">

        <select class="custom-select mb-2 mr-sm-2 mb-sm-0" placeholder="Due Date">
            <option value="Next 3 days">Next 3 days</option>
            <option value="Next 7 days">Next 7 days</option>
            <option value="Next 2 weeks">Next 2 weeks</option>
            <option value="Next month">Next month</option>
        </select>

        <div>
            <select class="custom-select mb-2 mr-sm-2 mb-sm-0" placeholder="Order">
                <option value="Start Date">Start Date</option>
                <option value="Due Date">Due Date</option>
                <option value="Manual">Manual</option>
                <option value="Title">Title</option>
            </select>

            <button type="button" class="btn btn-icon">
                <i class="icon icon-sort-ascending"></i>
            </button>
        </div>

    </div>
    <!-- / CONTENT TOOLBAR -->

    <div class="todo-items">

        

            <div
                class="todo-item pr-2 py-4 ripple row no-gutters flex-wrap flex-sm-nowrap align-items-center ">

                <button type="button" class="handle btn btn-icon mr-1">
                    <i class="icon icon-drag-vertical"></i>
                </button>

                <label class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" />
                    <span class="custom-control-indicator"></span>
                </label>

                <div class="info col px-4">

                    <div class="title">
                        Proident tempor est nulla irure ad est
                    </div>

                    <div class="notes mt-1">
                        Id nulla nulla proident deserunt deserunt proident in quis. Cillum reprehenderit labore id anim laborum.
                    </div>

                    <div class="tags">

                        
                            <div class="tag badge mt-2 mr-1">
                                <div class="row no-gutters align-items-center">
                                    <div class="tag-color mr-2" style="background-color: #388E3C"></div>
                                    <div class="tag-label">Frontend</div>
                                </div>
                            </div>
                        

                    </div>
                </div>

                <div class="buttons col-12 col-sm-auto d-flex align-items-center justify-content-end">

                    

                    

                    <button type="button" class="btn btn-icon">
                        <i class="icon icon-dots-vertical"></i>
                    </button>

                </div>
            </div>
        

            <div
                class="todo-item pr-2 py-4 ripple row no-gutters flex-wrap flex-sm-nowrap align-items-center ">

                <button type="button" class="handle btn btn-icon mr-1">
                    <i class="icon icon-drag-vertical"></i>
                </button>

                <label class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" />
                    <span class="custom-control-indicator"></span>
                </label>

                <div class="info col px-4">

                    <div class="title">
                        Magna quis irure quis ea pariatur laborum
                    </div>

                    <div class="notes mt-1">
                        
                    </div>

                    <div class="tags">

                        
                            <div class="tag badge mt-2 mr-1">
                                <div class="row no-gutters align-items-center">
                                    <div class="tag-color mr-2" style="background-color: #388E3C"></div>
                                    <div class="tag-label">Frontend</div>
                                </div>
                            </div>
                        
                            <div class="tag badge mt-2 mr-1">
                                <div class="row no-gutters align-items-center">
                                    <div class="tag-color mr-2" style="background-color: #0091EA"></div>
                                    <div class="tag-label">Issue</div>
                                </div>
                            </div>
                        

                    </div>
                </div>

                <div class="buttons col-12 col-sm-auto d-flex align-items-center justify-content-end">

                    
                        <button type="button" class="btn btn-icon">
                            <i class="icon icon-alert-circle"></i>
                        </button>
                    

                    

                    <button type="button" class="btn btn-icon">
                        <i class="icon icon-dots-vertical"></i>
                    </button>

                </div>
            </div>
        

            <div
                class="todo-item pr-2 py-4 ripple row no-gutters flex-wrap flex-sm-nowrap align-items-center ">

                <button type="button" class="handle btn btn-icon mr-1">
                    <i class="icon icon-drag-vertical"></i>
                </button>

                <label class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" />
                    <span class="custom-control-indicator"></span>
                </label>

                <div class="info col px-4">

                    <div class="title">
                        Ullamco duis commodo sint ad aliqua aute
                    </div>

                    <div class="notes mt-1">
                        Sunt laborum enim nostrud ea fugiat cillum mollit aliqua exercitation ad elit.
                    </div>

                    <div class="tags">

                        
                            <div class="tag badge mt-2 mr-1">
                                <div class="row no-gutters align-items-center">
                                    <div class="tag-color mr-2" style="background-color: #FF9800"></div>
                                    <div class="tag-label">API</div>
                                </div>
                            </div>
                        

                    </div>
                </div>

                <div class="buttons col-12 col-sm-auto d-flex align-items-center justify-content-end">

                    
                        <button type="button" class="btn btn-icon">
                            <i class="icon icon-alert-circle"></i>
                        </button>
                    

                    
                        <button type="button" class="btn btn-icon">
                            <i class="icon icon-star"></i>
                        </button>
                    

                    <button type="button" class="btn btn-icon">
                        <i class="icon icon-dots-vertical"></i>
                    </button>

                </div>
            </div>
        

            <div
                class="todo-item pr-2 py-4 ripple row no-gutters flex-wrap flex-sm-nowrap align-items-center completed">

                <button type="button" class="handle btn btn-icon mr-1">
                    <i class="icon icon-drag-vertical"></i>
                </button>

                <label class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" checked/>
                    <span class="custom-control-indicator"></span>
                </label>

                <div class="info col px-4">

                    <div class="title">
                        Eiusmod non occaecat pariatur Lorem in ex
                    </div>

                    <div class="notes mt-1">
                        Nostrud anim mollit incididunt qui qui sit commodo duis. Anim amet irure aliquip duis nostrud sit quis fugiat ullamco non dolor labore. Lorem sunt voluptate laboris culpa proident. Aute eiusmod aliqua exercitation irure exercitation qui laboris mollit occaecat eu occaecat fugiat.
                    </div>

                    <div class="tags">

                        
                            <div class="tag badge mt-2 mr-1">
                                <div class="row no-gutters align-items-center">
                                    <div class="tag-color mr-2" style="background-color: #F44336"></div>
                                    <div class="tag-label">Backend</div>
                                </div>
                            </div>
                        

                    </div>
                </div>

                <div class="buttons col-12 col-sm-auto d-flex align-items-center justify-content-end">

                    

                    
                        <button type="button" class="btn btn-icon">
                            <i class="icon icon-star"></i>
                        </button>
                    

                    <button type="button" class="btn btn-icon">
                        <i class="icon icon-dots-vertical"></i>
                    </button>

                </div>
            </div>
        

            <div
                class="todo-item pr-2 py-4 ripple row no-gutters flex-wrap flex-sm-nowrap align-items-center ">

                <button type="button" class="handle btn btn-icon mr-1">
                    <i class="icon icon-drag-vertical"></i>
                </button>

                <label class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" />
                    <span class="custom-control-indicator"></span>
                </label>

                <div class="info col px-4">

                    <div class="title">
                        Lorem magna cillum consequat consequat mollit
                    </div>

                    <div class="notes mt-1">
                        Velit ipsum proident ea incididunt et. Consectetur eiusmod laborum voluptate duis occaecat ullamco sint enim proident.
                    </div>

                    <div class="tags">

                        
                            <div class="tag badge mt-2 mr-1">
                                <div class="row no-gutters align-items-center">
                                    <div class="tag-color mr-2" style="background-color: #9C27B0"></div>
                                    <div class="tag-label">Mobile</div>
                                </div>
                            </div>
                        
                            <div class="tag badge mt-2 mr-1">
                                <div class="row no-gutters align-items-center">
                                    <div class="tag-color mr-2" style="background-color: #0091EA"></div>
                                    <div class="tag-label">Issue</div>
                                </div>
                            </div>
                        

                    </div>
                </div>

                <div class="buttons col-12 col-sm-auto d-flex align-items-center justify-content-end">

                    

                    

                    <button type="button" class="btn btn-icon">
                        <i class="icon icon-dots-vertical"></i>
                    </button>

                </div>
            </div>
        

            <div
                class="todo-item pr-2 py-4 ripple row no-gutters flex-wrap flex-sm-nowrap align-items-center ">

                <button type="button" class="handle btn btn-icon mr-1">
                    <i class="icon icon-drag-vertical"></i>
                </button>

                <label class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" />
                    <span class="custom-control-indicator"></span>
                </label>

                <div class="info col px-4">

                    <div class="title">
                        Quis irure cupidatat ad consequat reprehenderit excepteur
                    </div>

                    <div class="notes mt-1">
                        Esse nisi mollit aliquip mollit aute consequat adipisicing. Do excepteur dolore proident cupidatat pariatur irure consequat incididunt.
                    </div>

                    <div class="tags">

                        
                            <div class="tag badge mt-2 mr-1">
                                <div class="row no-gutters align-items-center">
                                    <div class="tag-color mr-2" style="background-color: #F44336"></div>
                                    <div class="tag-label">Backend</div>
                                </div>
                            </div>
                        
                            <div class="tag badge mt-2 mr-1">
                                <div class="row no-gutters align-items-center">
                                    <div class="tag-color mr-2" style="background-color: #FF9800"></div>
                                    <div class="tag-label">API</div>
                                </div>
                            </div>
                        

                    </div>
                </div>

                <div class="buttons col-12 col-sm-auto d-flex align-items-center justify-content-end">

                    

                    
                        <button type="button" class="btn btn-icon">
                            <i class="icon icon-star"></i>
                        </button>
                    

                    <button type="button" class="btn btn-icon">
                        <i class="icon icon-dots-vertical"></i>
                    </button>

                </div>
            </div>
        

            <div
                class="todo-item pr-2 py-4 ripple row no-gutters flex-wrap flex-sm-nowrap align-items-center completed">

                <button type="button" class="handle btn btn-icon mr-1">
                    <i class="icon icon-drag-vertical"></i>
                </button>

                <label class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" checked/>
                    <span class="custom-control-indicator"></span>
                </label>

                <div class="info col px-4">

                    <div class="title">
                        Officia voluptate tempor ut mollit ea cillum
                    </div>

                    <div class="notes mt-1">
                        Deserunt veniam reprehenderit do elit magna ut.
                    </div>

                    <div class="tags">

                        
                            <div class="tag badge mt-2 mr-1">
                                <div class="row no-gutters align-items-center">
                                    <div class="tag-color mr-2" style="background-color: #F44336"></div>
                                    <div class="tag-label">Backend</div>
                                </div>
                            </div>
                        
                            <div class="tag badge mt-2 mr-1">
                                <div class="row no-gutters align-items-center">
                                    <div class="tag-color mr-2" style="background-color: #0091EA"></div>
                                    <div class="tag-label">Issue</div>
                                </div>
                            </div>
                        

                    </div>
                </div>

                <div class="buttons col-12 col-sm-auto d-flex align-items-center justify-content-end">

                    

                    

                    <button type="button" class="btn btn-icon">
                        <i class="icon icon-dots-vertical"></i>
                    </button>

                </div>
            </div>
        

            <div
                class="todo-item pr-2 py-4 ripple row no-gutters flex-wrap flex-sm-nowrap align-items-center completed">

                <button type="button" class="handle btn btn-icon mr-1">
                    <i class="icon icon-drag-vertical"></i>
                </button>

                <label class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" checked/>
                    <span class="custom-control-indicator"></span>
                </label>

                <div class="info col px-4">

                    <div class="title">
                        Sit exercitation cupidatat minim est ipsum excepteur
                    </div>

                    <div class="notes mt-1">
                        
                    </div>

                    <div class="tags">

                        
                            <div class="tag badge mt-2 mr-1">
                                <div class="row no-gutters align-items-center">
                                    <div class="tag-color mr-2" style="background-color: #388E3C"></div>
                                    <div class="tag-label">Frontend</div>
                                </div>
                            </div>
                        
                            <div class="tag badge mt-2 mr-1">
                                <div class="row no-gutters align-items-center">
                                    <div class="tag-color mr-2" style="background-color: #FF9800"></div>
                                    <div class="tag-label">API</div>
                                </div>
                            </div>
                        

                    </div>
                </div>

                <div class="buttons col-12 col-sm-auto d-flex align-items-center justify-content-end">

                    
                        <button type="button" class="btn btn-icon">
                            <i class="icon icon-alert-circle"></i>
                        </button>
                    

                    

                    <button type="button" class="btn btn-icon">
                        <i class="icon icon-dots-vertical"></i>
                    </button>

                </div>
            </div>
        

            <div
                class="todo-item pr-2 py-4 ripple row no-gutters flex-wrap flex-sm-nowrap align-items-center ">

                <button type="button" class="handle btn btn-icon mr-1">
                    <i class="icon icon-drag-vertical"></i>
                </button>

                <label class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" />
                    <span class="custom-control-indicator"></span>
                </label>

                <div class="info col px-4">

                    <div class="title">
                        Sunt fugiat officia nisi minim sunt duis
                    </div>

                    <div class="notes mt-1">
                        Eiusmod eiusmod sint aliquip exercitation cillum. Magna nulla officia ex consectetur ea ad excepteur in qui.
                    </div>

                    <div class="tags">

                        
                            <div class="tag badge mt-2 mr-1">
                                <div class="row no-gutters align-items-center">
                                    <div class="tag-color mr-2" style="background-color: #9C27B0"></div>
                                    <div class="tag-label">Mobile</div>
                                </div>
                            </div>
                        

                    </div>
                </div>

                <div class="buttons col-12 col-sm-auto d-flex align-items-center justify-content-end">

                    

                    

                    <button type="button" class="btn btn-icon">
                        <i class="icon icon-dots-vertical"></i>
                    </button>

                </div>
            </div>
        

            <div
                class="todo-item pr-2 py-4 ripple row no-gutters flex-wrap flex-sm-nowrap align-items-center ">

                <button type="button" class="handle btn btn-icon mr-1">
                    <i class="icon icon-drag-vertical"></i>
                </button>

                <label class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" />
                    <span class="custom-control-indicator"></span>
                </label>

                <div class="info col px-4">

                    <div class="title">
                        Non cupidatat enim quis aliquip minim laborum
                    </div>

                    <div class="notes mt-1">
                        Qui cillum eiusmod nostrud sunt dolore velit nostrud labore voluptate ad dolore. Eu Lorem anim pariatur aliqua. Ullamco ut dolor velit esse occaecat dolore eu cillum commodo qui. Nulla dolor consequat voluptate magna ut commodo magna consectetur non aute proident.
                    </div>

                    <div class="tags">

                        
                            <div class="tag badge mt-2 mr-1">
                                <div class="row no-gutters align-items-center">
                                    <div class="tag-color mr-2" style="background-color: #F44336"></div>
                                    <div class="tag-label">Backend</div>
                                </div>
                            </div>
                        

                    </div>
                </div>

                <div class="buttons col-12 col-sm-auto d-flex align-items-center justify-content-end">

                    

                    

                    <button type="button" class="btn btn-icon">
                        <i class="icon icon-dots-vertical"></i>
                    </button>

                </div>
            </div>
        

            <div
                class="todo-item pr-2 py-4 ripple row no-gutters flex-wrap flex-sm-nowrap align-items-center ">

                <button type="button" class="handle btn btn-icon mr-1">
                    <i class="icon icon-drag-vertical"></i>
                </button>

                <label class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" />
                    <span class="custom-control-indicator"></span>
                </label>

                <div class="info col px-4">

                    <div class="title">
                        Dolor ex occaecat magna labore laboris qui
                    </div>

                    <div class="notes mt-1">
                        Incididunt qui excepteur eiusmod elit cillum occaecat voluptate cillum nostrud. Dolor ullamco ullamco eiusmod do sunt adipisicing pariatur. In esse esse labore id reprehenderit sint do. Pariatur culpa dolor tempor qui excepteur duis do anim minim ipsum.
                    </div>

                    <div class="tags">

                        
                            <div class="tag badge mt-2 mr-1">
                                <div class="row no-gutters align-items-center">
                                    <div class="tag-color mr-2" style="background-color: #FF9800"></div>
                                    <div class="tag-label">API</div>
                                </div>
                            </div>
                        

                    </div>
                </div>

                <div class="buttons col-12 col-sm-auto d-flex align-items-center justify-content-end">

                    
                        <button type="button" class="btn btn-icon">
                            <i class="icon icon-alert-circle"></i>
                        </button>
                    

                    

                    <button type="button" class="btn btn-icon">
                        <i class="icon icon-dots-vertical"></i>
                    </button>

                </div>
            </div>
        

            <div
                class="todo-item pr-2 py-4 ripple row no-gutters flex-wrap flex-sm-nowrap align-items-center ">

                <button type="button" class="handle btn btn-icon mr-1">
                    <i class="icon icon-drag-vertical"></i>
                </button>

                <label class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" />
                    <span class="custom-control-indicator"></span>
                </label>

                <div class="info col px-4">

                    <div class="title">
                        Ex nisi amet id dolore nostrud esse
                    </div>

                    <div class="notes mt-1">
                        
                    </div>

                    <div class="tags">

                        
                            <div class="tag badge mt-2 mr-1">
                                <div class="row no-gutters align-items-center">
                                    <div class="tag-color mr-2" style="background-color: #0091EA"></div>
                                    <div class="tag-label">Issue</div>
                                </div>
                            </div>
                        

                    </div>
                </div>

                <div class="buttons col-12 col-sm-auto d-flex align-items-center justify-content-end">

                    
                        <button type="button" class="btn btn-icon">
                            <i class="icon icon-alert-circle"></i>
                        </button>
                    

                    
                        <button type="button" class="btn btn-icon">
                            <i class="icon icon-star"></i>
                        </button>
                    

                    <button type="button" class="btn btn-icon">
                        <i class="icon icon-dots-vertical"></i>
                    </button>

                </div>
            </div>
        

            <div
                class="todo-item pr-2 py-4 ripple row no-gutters flex-wrap flex-sm-nowrap align-items-center ">

                <button type="button" class="handle btn btn-icon mr-1">
                    <i class="icon icon-drag-vertical"></i>
                </button>

                <label class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" />
                    <span class="custom-control-indicator"></span>
                </label>

                <div class="info col px-4">

                    <div class="title">
                        In dolor velit labore dolore ex eiusmod
                    </div>

                    <div class="notes mt-1">
                        
                    </div>

                    <div class="tags">

                        
                            <div class="tag badge mt-2 mr-1">
                                <div class="row no-gutters align-items-center">
                                    <div class="tag-color mr-2" style="background-color: #0091EA"></div>
                                    <div class="tag-label">Issue</div>
                                </div>
                            </div>
                        

                    </div>
                </div>

                <div class="buttons col-12 col-sm-auto d-flex align-items-center justify-content-end">

                    

                    

                    <button type="button" class="btn btn-icon">
                        <i class="icon icon-dots-vertical"></i>
                    </button>

                </div>
            </div>
        

            <div
                class="todo-item pr-2 py-4 ripple row no-gutters flex-wrap flex-sm-nowrap align-items-center ">

                <button type="button" class="handle btn btn-icon mr-1">
                    <i class="icon icon-drag-vertical"></i>
                </button>

                <label class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" />
                    <span class="custom-control-indicator"></span>
                </label>

                <div class="info col px-4">

                    <div class="title">
                        Sunt voluptate aliquip exercitation minim magna sit
                    </div>

                    <div class="notes mt-1">
                        
                    </div>

                    <div class="tags">

                        
                            <div class="tag badge mt-2 mr-1">
                                <div class="row no-gutters align-items-center">
                                    <div class="tag-color mr-2" style="background-color: #0091EA"></div>
                                    <div class="tag-label">Issue</div>
                                </div>
                            </div>
                        

                    </div>
                </div>

                <div class="buttons col-12 col-sm-auto d-flex align-items-center justify-content-end">

                    

                    

                    <button type="button" class="btn btn-icon">
                        <i class="icon icon-dots-vertical"></i>
                    </button>

                </div>
            </div>
        

            <div
                class="todo-item pr-2 py-4 ripple row no-gutters flex-wrap flex-sm-nowrap align-items-center ">

                <button type="button" class="handle btn btn-icon mr-1">
                    <i class="icon icon-drag-vertical"></i>
                </button>

                <label class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" />
                    <span class="custom-control-indicator"></span>
                </label>

                <div class="info col px-4">

                    <div class="title">
                        Nisi et ullamco minim ea proident tempor
                    </div>

                    <div class="notes mt-1">
                        Dolor veniam dolor cillum Lorem magna nisi in occaecat nulla dolor ea eiusmod.
                    </div>

                    <div class="tags">

                        
                            <div class="tag badge mt-2 mr-1">
                                <div class="row no-gutters align-items-center">
                                    <div class="tag-color mr-2" style="background-color: #F44336"></div>
                                    <div class="tag-label">Backend</div>
                                </div>
                            </div>
                        
                            <div class="tag badge mt-2 mr-1">
                                <div class="row no-gutters align-items-center">
                                    <div class="tag-color mr-2" style="background-color: #0091EA"></div>
                                    <div class="tag-label">Issue</div>
                                </div>
                            </div>
                        

                    </div>
                </div>

                <div class="buttons col-12 col-sm-auto d-flex align-items-center justify-content-end">

                    

                    
                        <button type="button" class="btn btn-icon">
                            <i class="icon icon-star"></i>
                        </button>
                    

                    <button type="button" class="btn btn-icon">
                        <i class="icon icon-dots-vertical"></i>
                    </button>

                </div>
            </div>
        

            <div
                class="todo-item pr-2 py-4 ripple row no-gutters flex-wrap flex-sm-nowrap align-items-center completed">

                <button type="button" class="handle btn btn-icon mr-1">
                    <i class="icon icon-drag-vertical"></i>
                </button>

                <label class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" checked/>
                    <span class="custom-control-indicator"></span>
                </label>

                <div class="info col px-4">

                    <div class="title">
                        Sit ipsum mollit cupidatat adipisicing officia aliquip
                    </div>

                    <div class="notes mt-1">
                        
                    </div>

                    <div class="tags">

                        
                            <div class="tag badge mt-2 mr-1">
                                <div class="row no-gutters align-items-center">
                                    <div class="tag-color mr-2" style="background-color: #388E3C"></div>
                                    <div class="tag-label">Frontend</div>
                                </div>
                            </div>
                        

                    </div>
                </div>

                <div class="buttons col-12 col-sm-auto d-flex align-items-center justify-content-end">

                    

                    

                    <button type="button" class="btn btn-icon">
                        <i class="icon icon-dots-vertical"></i>
                    </button>

                </div>
            </div>
        

            <div
                class="todo-item pr-2 py-4 ripple row no-gutters flex-wrap flex-sm-nowrap align-items-center ">

                <button type="button" class="handle btn btn-icon mr-1">
                    <i class="icon icon-drag-vertical"></i>
                </button>

                <label class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" />
                    <span class="custom-control-indicator"></span>
                </label>

                <div class="info col px-4">

                    <div class="title">
                        Amet sunt et quis amet commodo quis
                    </div>

                    <div class="notes mt-1">
                        Nulla dolore consequat aliqua sint consequat elit qui occaecat et.
                    </div>

                    <div class="tags">

                        
                            <div class="tag badge mt-2 mr-1">
                                <div class="row no-gutters align-items-center">
                                    <div class="tag-color mr-2" style="background-color: #388E3C"></div>
                                    <div class="tag-label">Frontend</div>
                                </div>
                            </div>
                        

                    </div>
                </div>

                <div class="buttons col-12 col-sm-auto d-flex align-items-center justify-content-end">

                    
                        <button type="button" class="btn btn-icon">
                            <i class="icon icon-alert-circle"></i>
                        </button>
                    

                    

                    <button type="button" class="btn btn-icon">
                        <i class="icon icon-dots-vertical"></i>
                    </button>

                </div>
            </div>
        

            <div
                class="todo-item pr-2 py-4 ripple row no-gutters flex-wrap flex-sm-nowrap align-items-center ">

                <button type="button" class="handle btn btn-icon mr-1">
                    <i class="icon icon-drag-vertical"></i>
                </button>

                <label class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" />
                    <span class="custom-control-indicator"></span>
                </label>

                <div class="info col px-4">

                    <div class="title">
                        Ut eiusmod ex ea eiusmod culpa incididunt
                    </div>

                    <div class="notes mt-1">
                        Fugiat non incididunt officia ex incididunt occaecat. Voluptate nostrud culpa aliquip mollit incididunt non dolore.
                    </div>

                    <div class="tags">

                        
                            <div class="tag badge mt-2 mr-1">
                                <div class="row no-gutters align-items-center">
                                    <div class="tag-color mr-2" style="background-color: #F44336"></div>
                                    <div class="tag-label">Backend</div>
                                </div>
                            </div>
                        

                    </div>
                </div>

                <div class="buttons col-12 col-sm-auto d-flex align-items-center justify-content-end">

                    

                    

                    <button type="button" class="btn btn-icon">
                        <i class="icon icon-dots-vertical"></i>
                    </button>

                </div>
            </div>
        

            <div
                class="todo-item pr-2 py-4 ripple row no-gutters flex-wrap flex-sm-nowrap align-items-center completed">

                <button type="button" class="handle btn btn-icon mr-1">
                    <i class="icon icon-drag-vertical"></i>
                </button>

                <label class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" checked/>
                    <span class="custom-control-indicator"></span>
                </label>

                <div class="info col px-4">

                    <div class="title">
                        Proident reprehenderit laboris pariatur ut et nisi
                    </div>

                    <div class="notes mt-1">
                        Reprehenderit proident ut ad cillum quis velit quis aliqua ut aliquip tempor ullamco.
                    </div>

                    <div class="tags">

                        
                            <div class="tag badge mt-2 mr-1">
                                <div class="row no-gutters align-items-center">
                                    <div class="tag-color mr-2" style="background-color: #9C27B0"></div>
                                    <div class="tag-label">Mobile</div>
                                </div>
                            </div>
                        

                    </div>
                </div>

                <div class="buttons col-12 col-sm-auto d-flex align-items-center justify-content-end">

                    
                        <button type="button" class="btn btn-icon">
                            <i class="icon icon-alert-circle"></i>
                        </button>
                    

                    
                        <button type="button" class="btn btn-icon">
                            <i class="icon icon-star"></i>
                        </button>
                    

                    <button type="button" class="btn btn-icon">
                        <i class="icon icon-dots-vertical"></i>
                    </button>

                </div>
            </div>
        

            <div
                class="todo-item pr-2 py-4 ripple row no-gutters flex-wrap flex-sm-nowrap align-items-center completed">

                <button type="button" class="handle btn btn-icon mr-1">
                    <i class="icon icon-drag-vertical"></i>
                </button>

                <label class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" checked/>
                    <span class="custom-control-indicator"></span>
                </label>

                <div class="info col px-4">

                    <div class="title">
                        Aliqua aliquip aliquip aliquip et exercitation aute
                    </div>

                    <div class="notes mt-1">
                        Adipisicing Lorem tempor ex anim. Labore tempor laboris nostrud dolore voluptate ullamco. Fugiat ex deserunt anim minim esse velit laboris aute ea duis incididunt. Elit irure id Lorem incididunt laborum aliquip consectetur est irure sunt. Ut labore anim nisi aliqua tempor laborum nulla cillum. Duis irure consequat cillum magna cillum eiusmod ut. Et exercitation voluptate quis deserunt elit quis dolor deserunt ex ex esse ex.
                    </div>

                    <div class="tags">

                        
                            <div class="tag badge mt-2 mr-1">
                                <div class="row no-gutters align-items-center">
                                    <div class="tag-color mr-2" style="background-color: #FF9800"></div>
                                    <div class="tag-label">API</div>
                                </div>
                            </div>
                        

                    </div>
                </div>

                <div class="buttons col-12 col-sm-auto d-flex align-items-center justify-content-end">

                    
                        <button type="button" class="btn btn-icon">
                            <i class="icon icon-alert-circle"></i>
                        </button>
                    

                    

                    <button type="button" class="btn btn-icon">
                        <i class="icon icon-dots-vertical"></i>
                    </button>

                </div>
            </div>
        
    </div>
</div>
        </div>



@endsection