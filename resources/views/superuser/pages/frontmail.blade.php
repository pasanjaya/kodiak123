{{-- extend layout  --}}
@extends('superuser.layouts.superuserAppad')

{{-- start of section content  --}}
@section('content')

        <div class="container" style="margin-top: 100px; width: 600px;">
            <h2 class="text-center">Send notification email to advertisers</h2><br><br>
            {{-- form for mail front page --}}
            <form action="send" method="POST">
                {{ csrf_field() }} {{-- to protect email from malicious site --}}
                <div class="form-group">
                    
                    <label for="email">Email </label>
                    {{-- <input type="email" class="form-control " placeholder="Provide an email" name="email"><br> --}}
                    <select name="email"  class="form-control">
                        @foreach($mail as $mail)
                        <option value="{{$mail->email}}">{{$mail->email}}</option>
                        @endforeach
                    </select>
                    <br><br>
                     
                    <label for="textarea">Description </label>
                    <textarea class="form-control " placeholder="compose mail" name="composeemail" ></textarea><br>
                    
                    <button type="submit" class="btn btn-primary btn-md" style="margin-left: 0px;margin: auto; display: block;"t>SEND</button>
                
                </div>
            </form>
        </div>

{{-- end of section content  --}}    
@endsection
