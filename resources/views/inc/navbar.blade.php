<nav class="navbar navbar-dark fixed-top bg-dark-blue flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="/">{{config('app.name'), 'KodiakOffers'}}</a>

    <div class="nav-link">
      {!!Form::open(['action' => 'Auth\LoginController@logout', 'method' => 'POST'])!!}
          {{Form::submit('Logout', ['class'=> 'btn btn-sm border btn-link mt-1 ml-2 mb-1', 'style'=> 'color: #fff; text-decoration:none'])}}
      {!!Form::close()!!}
    </div>
</nav>


<div class="container-fluid">
        <div class="row">
          <nav class="col-md-2 d-none d-md-block nav_column_dashboard sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column mt-4">
                    <li class="nav-item mb-3">

                      <div class="d-flex flex-column ">
                        <div class="d-flex justify-content-center">
                            <a class="nav-link" href="/dashboard/profile">
                              <img src="/storage/brand_logos/man.svg" alt="im_advertiser" class="rounded-circle border border-dark bg-light" style="width:70px; height:70px;">
                            </a>
                        </div>
                      </div>

                        <div class="d-flex flex-column">
                          <div class="justify-content-center">
                            <div class="text-white text-center">
                              <a class="nav-link" href="/dashboard/profile">
                                {{ auth()->user()->name }} <span data-feather="edit"></span><span class="sr-only">(current)</span>
                              </a>
                            </div>

                            <div class="text-center">
                              <span class="font-italic text-secondary">{{auth()->user()->email}}</span>
                            </div>
                          </div>
                        </div>                      

                      </li>
                    <li class="nav-item mt-2">
                      <a class="nav-link" href="/dashboard">
                        <span data-feather="home"></span>
                        Dashboard <span class="sr-only">(current)</span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/dashboard/offers">
                        <span data-feather="plus"></span>
                        Offers
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/dashboard/messages">
                        <span data-feather="message-circle"></span>
                        Messages
                      </a>
                    </li>
                  </ul>
            </div>
          </nav>
    
          <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
              <span class="h5 text-capitalize font-italic text-muted">@php $uri = Request::path(); echo str_replace('/', ' > ', $uri) @endphp</span>
            </div>
            




        

      