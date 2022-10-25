@extends('client/layout')

@section('content')
    <style>
        .user-list tbody td>img {
            position: relative;
            max-width: 50px;
            float: left;
            margin-right: 15px;
        }

        .user-list tbody td .user-link {
            display: block;
            font-size: 1.25em;
            padding-top: 3px;
            margin-left: 60px;
        }

        .user-list tbody td .user-subhead {
            font-size: 0.875em;
            font-style: italic;
        }

        /* TABLES */
        .table {
            border-collapse: separate;
        }

        .table-hover>tbody>tr:hover>td,
        .table-hover>tbody>tr:hover>th {
            background-color: #eee;
        }

        .table thead>tr>th {
            border-bottom: 1px solid #C2C2C2;
            padding-bottom: 0;
        }

        .table tbody>tr>td {
            font-size: 0.875em;
            background: #f5f5f5;
            border-top: 10px solid rgba(var(--bs-light-rgb), var(--bs-bg-opacity)) !important;
            vertical-align: middle;
            padding: 12px 8px;
        }

        .table tbody>tr>td:first-child,
        .table thead>tr>th:first-child {
            padding-left: 20px;
        }

        .table thead>tr>th span {
            border-bottom: 2px solid #C2C2C2;
            display: inline-block;
            padding: 0 5px;
            padding-bottom: 5px;
            font-weight: normal;
        }

        .table thead>tr>th>a span {
            color: #344644;
        }

        .table thead>tr>th>a span:after {
            content: "\f0dc";
            font-family: FontAwesome;
            font-style: normal;
            font-weight: normal;
            text-decoration: inherit;
            margin-left: 5px;
            font-size: 0.75em;
        }

        .table thead>tr>th>a.asc span:after {
            content: "\f0dd";
        }

        .table thead>tr>th>a.desc span:after {
            content: "\f0de";
        }

        .table thead>tr>th>a:hover span {
            text-decoration: none;
            color: #2bb6a3;
            border-color: #2bb6a3;
        }

        .table.table-hover tbody>tr>td {
            -webkit-transition: background-color 0.15s ease-in-out 0s;
            transition: background-color 0.15s ease-in-out 0s;
        }

        .table tbody tr td .call-type {
            display: block;
            font-size: 0.75em;
            text-align: center;
        }

        .table tbody tr td .first-line {
            line-height: 1.5;
            font-weight: 400;
            font-size: 1.125em;
        }

        .table tbody tr td .first-line span {
            font-size: 0.875em;
            color: #969696;
            font-weight: 300;
        }

        .table tbody tr td .second-line {
            font-size: 0.875em;
            line-height: 1.2;
        }

        .table a.table-link {
            margin: 0 5px;
            font-size: 1.125em;
        }

        .table a.table-link:hover {
            text-decoration: none;
            color: #2aa493;
        }

        .table a.table-link.danger {
            color: #fe635f;
        }

        .table a.table-link.danger:hover {
            color: #dd504c;


        }

        .table-products tbody>tr>td {
            background: none;
            border: none;
            border-bottom: 1px solid rgba(var(--bs-light-rgb), var(--bs-bg-opacity)) !important;
            -webkit-transition: background-color 0.15s ease-in-out 0s;
            transition: background-color 0.15s ease-in-out 0s;
            position: relative;
        }

        .table-products tbody>tr:hover>td {
            text-decoration: none;
            background-color: rgba(var(--bs-light-rgb), var(--bs-bg-opacity)) !important;
        }

        .table-products .name {
            display: block;
            font-weight: 600;
            padding-bottom: 7px;
        }

        .table-products .price {
            display: block;
            text-decoration: none;
            width: 50%;
            float: left;
            font-size: 0.875em;
        }

        .table-products .price>i {
            color: #8dc859;
        }

        .table-products .warranty {
            display: block;
            text-decoration: none;
            width: 50%;
            float: left;
            font-size: 0.875em;
        }

        .table-products .warranty>i {
            color: #f1c40f;
        }

        .table tbody>tr.table-line-fb>td {
            background-color: rgba(var(--bs-light-rgb), var(--bs-bg-opacity)) !important;
            color: #262525;
        }

        .table tbody>tr.table-line-twitter>td {
            background-color: rgba(var(--bs-light-rgb), var(--bs-bg-opacity)) !important;
            color: #262525;
        }

        .table tbody>tr.table-line-plus>td {
            background-color: #eea59c;
            color: #262525;
        }

        .table-stats .status-social-icon {
            font-size: 1.9em;
            vertical-align: bottom;
        }

        .table-stats .table-line-fb .status-social-icon {
            color: #556484;
        }

        .table-stats .table-line-twitter .status-social-icon {
            color: #5885b8;
        }

        .table-stats .table-line-plus .status-social-icon {
            color: #a75d54;
        }
    </style>

    <main>
        <div class="album py-5 bg-light">
            <div class="container">

                <div class="col-sm-12 col-md-10 mx-auto">


                    <h3 class="box-title mb-0">Mes réclamations </h3>
                    <div class="col-lg-12">
                        <div class="main-box clearfix">
                            <div class="table-responsive">
                                <table class="table user-list">

                                    <tbody>
                                        @if ($reclamations != [])
                                            @foreach ($reclamations as $reclamations)
                                                <tr>
                                                    <td>
                                                        @if ($reclamations->image)
                                                            <img src="{{ asset('images/imagesReclamations/' . $reclamations->image) }}"
                                                                width=100 height=100 alt="">
                                                        @else
                                                            <img src="{{ asset('images/imagesReclamations/R.png') }}"
                                                                width=100 height=100 alt="">
                                                        @endif
                                                        <span class="user-subhead">Réclamation N°
                                                            {{ $reclamations->id }}</span>
                                                    </td>
                                                    <td align="center" class="txt-oflo">{{ $reclamations->objet }}</td>
                                                    <td align="center" class="txt-oflo" colspan="2">
                                                        {{ $reclamations->message }}</td>

                                                    <td align="center">
                                                        {{ date('d-m-Y H:i', strtotime($reclamations->created_at)) }}
                                                    </td>
                                                    <td align="center" class="text-center ">
                                                        @if ($reclamations->statut == 0)
                                                            <span class="label label-danger" style="color: red">en
                                                                cours</span>
                                                        @else
                                                            <span class="label label-default"
                                                                style="color: green">Valider</span>
                                                        @endif
                                                    </td>
                                                    @if ($reclamations->statut != 1)
                                                        <td align="center">
                                                            <a href="{{ route('reclamations.edit', $reclamations->id) }}"
                                                                class="table-link">
                                                                <span class="fa-stack">
                                                                    <i class="fa fa-square fa-stack-2x"></i>
                                                                    <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                                                </span>
                                                            </a>
                                                        </td>
                                                    @else
                                                        <td align="center">
                                                            <a class="table-link"
                                                                href="{{ route('reponse.show', $reclamations->id) }}">
                                                                <span class="fa-stack" style="color: #969696">
                                                                    <i class="fa fa-square fa-stack-2x"></i>
                                                                    <i class="fa fa fa-info fa-stack-1x fa-inverse"></i>
                                                                </span>
                                                            </a>
                                                        </td>
                                                    @endif
                                                    <td align="center">
                                                        <form
                                                            action="{{ route('reclamations.destroy', $reclamations->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn" type="submit"><span class="fa-stack">
                                                                    <i class="fa fa-square fa-stack-2x"></i>
                                                                    <i class="fa fa-trash fa-stack-1x fa-inverse"></i>
                                                                </span></button>
                                                        </form>
                                                    </td>


                                                </tr>
                                            @endforeach
                                        @endif
                                        @if ($reclamations == [])
                                            <br>
                                            <span class="user-subhead">Vous n'avez aucune réclamation </span>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
