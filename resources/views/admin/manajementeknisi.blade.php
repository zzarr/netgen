@extends('admin.layouts.app')
@section('content')
<div class="page-header">
                    <div class="page-title">
                        <h3>Manajemen Teknisi</h3>
                    </div>

                    <nav class="breadcrumb-one" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg></a></li>
                            <!-- <li class="breadcrumb-item"><a href="javascript:void(0);">Starter Kits</a></li> -->
                            <li class="breadcrumb-item active" aria-current="page"><span>Manajemen Teknisi</span></li>
                        </ol>
                    </nav>

                </div>

                <div class="row layout-spacing">
                    <div class="col-lg-12">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h4>Style 3</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">
                                <div class="table-responsive mb-4">
                                    <table id="style-3" class="table style-3  table-hover">
                                        <thead>
                                            <tr>
                                                <th class="checkbox-column text-center"> Record Id </th>
                                                <th class="text-center">Image</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Email</th>
                                                <th>Mobile No.</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="checkbox-column text-center"> 1 </td>
                                                <td class="text-center">
                                                    <span><img src="assets/img/90x90.jpg" class="profile-img" alt="avatar"></span>
                                                </td>
                                                <td>Donna</td>
                                                <td>Rogers</td>
                                                <td>donna@yahoo.com</td>
                                                <td>555-555-5555</td>
                                                <td class="text-center"><span class="shadow-none badge badge-primary">Approved</span></td>
                                                <td class="text-center">
                                                    <ul class="table-controls">
                                                        <li><a href="javascript:void(0);" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-6 mb-1"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></li>
                                                        <li><a href="javascript:void(0);" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-6 mb-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a></li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="checkbox-column text-center"> 2 </td>
                                                <td class="text-center">
                                                    <span><img src="assets/img/90x90.jpg" class="profile-img" alt="avatar"></span>
                                                </td>
                                               <td>Andy</td>
                                                <td>King</td>
                                                <td>andyking@gmail.com</td>
                                                <td>555-555-6666</td>
                                                <td class="text-center"><span class="shadow-none badge badge-warning">Suspended</span></td>
                                                <td class="text-center">
                                                    <ul class="table-controls">
                                                        <li><a href="javascript:void(0);" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-6 mb-1"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></li>
                                                        <li><a href="javascript:void(0);" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-6 mb-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a></li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="checkbox-column text-center"> 3 </td>
                                                <td class="text-center">
                                                    <span><img src="assets/img/90x90.jpg" class="profile-img" alt="avatar"></span>
                                                </td>
                                                <td>Alma</td>
                                                <td>Clarke</td>
                                                <td>Alma@live.com</td>
                                                <td>777-555-5555</td>
                                                <td class="text-center"><span class="shadow-none badge badge-danger">Closed</span></td>
                                                <td class="text-center">
                                                    <ul class="table-controls">
                                                        <li><a href="javascript:void(0);" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-6 mb-1"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></li>
                                                        <li><a href="javascript:void(0);" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-6 mb-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a></li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="checkbox-column text-center"> 4 </td>
                                                <td class="text-center">
                                                    <span><img src="assets/img/90x90.jpg" class="profile-img" alt="avatar"></span>
                                                </td>
                                                <td>Vincent</td>
                                                <td>Carpenter</td>
                                                <td>vinnyc@outlook.com</td>
                                                <td>555-666-5555</td>
                                                <td class="text-center"><span class="shadow-none badge badge-primary">Approved</span></td>
                                                <td class="text-center">
                                                    <ul class="table-controls">
                                                        <li><a href="javascript:void(0);" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-6 mb-1"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></li>
                                                        <li><a href="javascript:void(0);" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-6 mb-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a></li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="checkbox-column text-center"> 5 </td>
                                                <td class="text-center">
                                                    <span><img src="assets/img/90x90.jpg" class="profile-img" alt="avatar"></span>
                                                </td>
                                                <td>Kristen</td>
                                                <td>Beck</td>
                                                <td>kristen@adobe.com</td>
                                                <td>444-444-4444</td>
                                                <td class="text-center"><span class="shadow-none badge badge-warning">Suspended</span></td>
                                                <td class="text-center">
                                                    <ul class="table-controls">
                                                        <li><a href="javascript:void(0);" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-6 mb-1"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></li>
                                                        <li><a href="javascript:void(0);" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-6 mb-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a></li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="checkbox-column text-center"> 6 </td>
                                                <td class="text-center">
                                                    <span><img src="assets/img/90x90.jpg" class="profile-img" alt="avatar"></span>
                                                </td>
                                                <td>Oscar</td>
                                                <td>Garner</td>
                                                <td>oscar@gmail.com</td>
                                                <td>111-111-1111</td>
                                                <td class="text-center"><span class="shadow-none badge badge-danger">Closed</span></td>
                                                <td class="text-center">
                                                    <ul class="table-controls">
                                                        <li><a href="javascript:void(0);" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-6 mb-1"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></li>
                                                        <li><a href="javascript:void(0);" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-6 mb-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a></li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="checkbox-column text-center"> 7 </td>
                                                <td class="text-center">
                                                    <span><img src="assets/img/90x90.jpg" class="profile-img" alt="avatar"></span>
                                                </td>
                                                <td>Nia</td>
                                                <td>Hillyer</td>
                                                <td>niaHill@yahoo.com</td>
                                                <td>111-666-1111</td>
                                                <td class="text-center"><span class="shadow-none badge badge-primary">Approved</span></td>
                                                <td class="text-center">
                                                    <ul class="table-controls">
                                                        <li><a href="javascript:void(0);" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-6 mb-1"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></li>
                                                        <li><a href="javascript:void(0);" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-6 mb-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a></li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              
    @endsection
