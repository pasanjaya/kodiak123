@extends('layouts.appad')


@section('content')

    <div class="h2 text-info">Edit Profile</div><hr>
    <div class="row">
        <div class="col-3">
            <div class="row justify-content-center mb-4">
                <img src="/svg/man.svg" alt="im_advertiser" class="rounded-circle border border-dark mr-2" style="width:120px; height:120px;">
            </div>
            <div class="row text-center justify-content-center">
                <form>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Upload a different image</label>
                        <input type="file" class="form-control-file border" id="exampleFormControlFile1">
                    </div>
            </div>
        </div>
        
        <div class="col-9">
            <div class="card border-0">
                <div class="card-header bg-transparent">
                    <ul class="nav nav-tabs card-header-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="account-tab" data-toggle="tab" href="#account" role="tab" aria-controls="account" aria-selected="true">Account</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Business Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
                            <form>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="staticEmail" value="{{auth()->user()->name}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" id="staticEmail" value="{{auth()->user()->email}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                    <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Confirm Password</label>
                                    <div class="col-sm-10">
                                    <input type="password" class="form-control" id="inputPassword" placeholder="Confirm Password">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <form>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Registerd Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="staticEmail" value="{{auth()->user()->name}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Registered No</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="staticEmail" value="{{auth()->user()->name}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Registerd Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="staticEmail" value="{{auth()->user()->name}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputState" class="col-sm-2 col-form-label">Category</label>
                                    <div class="col-sm-10">
                                        <select id="inputState" class="form-control">
                                            <option selected>Choose...</option>
                                            <option>...</option>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
                    </div>
                </div>
                </div>
        </div>
    </div>

@endsection