@extends('layouts.new_app')

@section('content')
        <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li><li class="breadcrumb-item active">Overview</li>
          </ol>
          <!-- Icon Cards-->
          <!-- Icon Cards-->
          <div class="row">
            <div class="col-xl-6 col-sm-6 mb-6">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-tasks"></i>
                  </div>
                  <div class="mr-5">{{$songs}} total Applications!</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" >
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-6 col-sm-6 mb-6">
              <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-list"></i>
                  </div>
                  <div class="mr-5">{{$users}} jobs!</div>
                </div>
                
              </div>
            </div>
            
            </div>
          </div>
@endsection
