<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('#') }}">
                Filemanager
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                {{--<li><a href="{{ url('/home') }}">Home</a></li>--}}
                <li><a href="{{ url('/files') }}">Files</a></li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
<div class="centered">
    <h2>Select files for upload</h2>
    <div class="row bottom-space">
        <form>
            <div class="input-group">
                <input
                        type="file"
                        id="filesUploader"
                        name="files[]"
                        multiple
                        class="form-control"
                        (change)="filesSelectionHandler($event)"
                >
            <span class="input-group-btn">
                <button
                        type="submit"
                        class="btn btn-default"
                        (click)="filesUploadHandler($event)"
                >Upload</button>
            </span>
            </div>
        </form>
    </div>
    <div class="row">
        <progress-bar *ngIf="progressBarVisibility" [progress]="uploadProgress"></progress-bar>
    </div>
    <div class="row">
        <h4 *ngIf="files.length">Selected files:</h4>
        <ul class="list-group">
            <li *ngFor="let file of files" class="list-group-item">
                @{{ file.name }}
            </li>
        </ul>
    </div>
</div>
<div  class="centered">
    <table-demo ></table-demo>
</div>
<div  class="centered">
    <data-table ></data-table>
</div>