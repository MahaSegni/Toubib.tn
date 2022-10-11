@extends('admin/layout')
@section('content')
  <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Réclamations</h4>
                    </div>
                 </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">

               <!-- @yield('stat') -->

               <div class="row justify-content-center">
                <div class="col-lg-4 col-md-12">
                    <div class="white-box analytics-info">
                        <h3 class="box-title">Totale Réclamations </h3>
                        <ul class="list-inline two-part d-flex align-items-center mb-0">
                            <li>
                                <div id="sparklinedash"><canvas width="67" height="30"
                                        style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                </div>
                            </li>
                            @if (count($reclamations) != 0)
                            <li class="ms-auto"><span class="counter text-success">{{ $reclamations }}</span></li>
                            @else
                            <li class="ms-auto"><span class="counter text-success">0</span></li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="white-box analytics-info">
                        <h3 class="box-title">Réclamations traités</h3>
                        <ul class="list-inline two-part d-flex align-items-center mb-0">
                            <li>
                                <div id="sparklinedash2"><canvas width="67" height="30"
                                        style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                </div>
                            </li>
                            @if (count($reclamations) != 0)
                            <li class="ms-auto"><span class="counter text-purple">{{ $reclamations }}</span></li>
                            @else
                            <li class="ms-auto"><span class="counter text-purple">0</span></li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="white-box analytics-info">
                        <h3 class="box-title">Réclamations en cours</h3>
                        <ul class="list-inline two-part d-flex align-items-center mb-0">
                            <li>
                                <div id="sparklinedash3"><canvas width="67" height="30"
                                        style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                </div>
                            </li>
                            @if (count($reclamations) != 0)
                            <li class="ms-auto"><span class="counter text-info">{{ $reclamations }}</span></li>
                            @else
                            <li class="ms-auto"><span class="counter text-info">0</span></li>
                            @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

                <!-- ============================================================== -->
                <!-- RECENT SALES -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <div class="d-md-flex mb-3">
                                <h3 class="box-title mb-0">Liste des réclamations </h3>
                                <div class="col-md-3 col-sm-4 col-xs-6 ms-auto">
                                    <select class="form-select shadow-none row border-top">
                                        <option>En cours</option>
                                        <option>Terminer</option>
                                        <option>Totale</option>

                                    </select>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table no-wrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">Objet</th>
                                            <th class="border-top-0">Message</th>
                                            <th class="border-top-0">Date</th>
                                            <th class="border-top-0">Statut</th>
                                            <th class="border-top-0">Répondre</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($reclamations as $reclamations)
                                        <tr>
                                            <td>1</td>
                                            <td class="txt-oflo">{{$reclamations->objet}}</td>
                                            <td>{{$reclamations->message}}</td>
                                            <td class="txt-oflo">{{$reclamations->datecreation}}</td>
                                            <td><span class="text-success">{{$reclamations->statut}}</span></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                </div>
            </div>
@endsection
