
@extends('master')

@section('header')
        <h1 class="display-4">FIND YOUR TOP 10</h1>
        <p class="lead">Vote each month your top three songs in various genres. </p>
@endsection

@section('content')
<div class="album py-5 bg-#3e3b3b">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">

                    <div class="djimage" id="trance">
                        <a href="#" ><h5 class="djimage-title">TRANCE</h5></a>
                    </div>

                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">        
                                <a class="vote" href="add">Vote</a> &nbsp;
                                <a class="top" href="add">Top 10</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">

                    <div class="djimage" id="progress">
                        <a href="#" ><h5 class="djimage-title">PROGRESS</h5></a>
                    </div>

                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary">Vote</button> 
                                <button type="button" class="btn btn-sm btn-outline-secondary">Top 10</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">

                    <div class="djimage" id="dnb">
                        <a href="#" ><h5 class="djimage-title">DNB</h5></a>
                    </div>

                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary">Vote</button>
                                <button type="button" class="btn btn-sm btn-outline-secondary">Top 10</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">

                    <div class="djimage" id="bigroom">
                        <a href="#" ><h5 class="djimage-title">BIG ROOM</h5></a>
                    </div>

                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary">Vote</button> 
                                <button type="button" class="btn btn-sm btn-outline-secondary">Top 10</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">

                    <div class="djimage" id="hardstyle">
                        <a href="#" ><h5 class="djimage-title">HARDSTYLE</h5></a>
                    </div>

                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary">Vote</button>
                                <button type="button" class="btn btn-sm btn-outline-secondary">Top 10</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">

                    <div class="djimage" id="psy">
                        <a href="#" ><h5 class="djimage-title">PSY TRANCE</h5></a>
                    </div>

                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary">Vote</button>
                                <button type="button" class="btn btn-sm btn-outline-secondary">Top 10</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection