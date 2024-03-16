<!-- sidebar -->
<div class="cr-sidebar-overlay"></div>
<div class="cr-sidebar" data-mode="light">
    <div class="cr-sb-logo">
        <a href="{{ route('homePage') }}" class="sb-full"><img
                src="{{ asset('account/assets/img/logo/full-logo.png') }}" alt="logo"></a>
        <a href="{{ route('homePage') }}" class="sb-collapse"><img
                src="{{ asset('account/assets/img/logo/collapse-logo.png') }}" alt="logo"></a>
    </div>
    <div class="cr-sb-wrapper">
        <div class="cr-sb-content">
            <ul class="cr-sb-list">
                <li class="cr-sb-item">
                    <a href="{{ route('adminDashboard') }}" class="cr-page-link">
                        <i class="ri-radio-button-line"></i>
                        <span class="condense">
                            <span class="hover-title">Dashboard</span>
                        </span>
                    </a>
                </li>
                <li class="cr-sb-item">
                    <a href="{{ route('categoryIndex') }}" class="cr-page-link">
                        <i class="ri-bar-chart-grouped-line"></i>
                        <span class="condense">
                            <span class="hover-title">Category</span>
                        </span>
                    </a>

                </li>
                <li class="cr-sb-item">
                    <a href="{{ route('subCategoryIndex') }}" class="cr-page-link">
                        <i class="ri-bar-chart-grouped-line"></i>
                        <span class="condense">
                            <span class="hover-title">Sub Category
                            </span>
                        </span>
                    </a>
                </li>
                <li class="cr-sb-item">
                    <a href="buttons.html" class="cr-page-link">
                        <i class="ri-radio-button-line"></i><span class="condense"><span
                                class="hover-title">Admin</span></span></a>
                </li>
                <li class="cr-sb-item">
                    <a href="accordions.html" class="cr-page-link">
                        <i class="ri-play-list-add-line"></i><span class="condense"><span
                                class="hover-title">Blogs</span></span></a>
                </li>
                <li class="cr-sb-item">
                    <a href="typography.html" class="cr-page-link">
                        <i class="ri-file-text-line"></i><span class="condense"><span class="hover-title">All
                                Logs</span></span></a>
                </li>
                <li class="cr-sb-item">
                    <a href="{{ route('logOut') }}" class="cr-page-link">
                        <i class="ri-logout-circle-r-line"></i><span class="condense"><span class="hover-title">Sign
                                Out</span></span></a>
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- Notify sidebar -->
<div class="cr-notify-bar-overlay"></div>
<div class="cr-notify-bar">
    <div class="cr-bar-title">
        <h6>Notifications<span class="label">12</span></h6>
        <a href="javascript:void(0)" class="close-notify"><i class="ri-close-line"></i></a>
    </div>
    <div class="cr-bar-content">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="log-tab" data-bs-toggle="tab" data-bs-target="#log" type="button"
                    role="tab" aria-controls="log" aria-selected="false">Log</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade" id="log" role="tabpanel" aria-labelledby="log-tab">
                <div class="cr-activity-list activity-list">
                    <ul>
                        <li>
                            <span class="date-time">8 Thu<span class="time">11:30 AM - 05:10 PM
                                </span></span>
                            <p class="title">Project Submitted from Smith</p>
                            <p class="detail">Lorem Ipsum is simply dummy text of the printing and
                                lorem is typesetting industry.</p>
                            <span class="download-files">
                                <span class="download">
                                    <img src="assets/img/other/1.jpg" alt="image">
                                    <a href="javascript:void(0)"><i class="ri-download-2-line"></i></a>
                                </span>
                                <span class="download">
                                    <img src="assets/img/other/2.jpg" alt="image">
                                    <a href="javascript:void(0)"><i class="ri-download-2-line"></i></a>
                                </span>
                                <span class="download">
                                    <span class="file">
                                        <i class="ri-file-ppt-line"></i>
                                    </span>
                                    <a href="javascript:void(0)"><i class="ri-download-2-line"></i></a>
                                </span>
                            </span>
                        </li>
                        <li>
                            <span class="date-time warn">7 Wed<span class="time">1:30 PM - 02:30 PM
                                </span></span>
                            <p class="title">Morgus pvt - project due</p>
                            <p class="detail">Project modul delay for some bugs.</p>
                            <span class="download-files">
                                <span class="download">
                                    <span class="file">
                                        <i class="ri-file-zip-line"></i>
                                    </span>
                                    <a href="javascript:void(0)"><i class="ri-download-2-line"></i></a>
                                </span>
                                <span class="download">
                                    <span class="file">
                                        <i class="ri-file-text-line"></i>
                                    </span>
                                    <a href="javascript:void(0)"><i class="ri-download-2-line"></i></a>
                                </span>
                                <span class="download">
                                    <img src="assets/img/other/3.jpg" alt="image">
                                    <a href="javascript:void(0)"><i class="ri-download-2-line"></i></a>
                                </span>
                            </span>
                        </li>
                        <li>
                            <span class="date-time">6 Tue<span class="time">9:30 AM - 11:00 AM
                                </span></span>
                            <p class="title">Interview for management dept.</p>
                            <p class="detail">There are many variations of passages of Lorem Ipsum
                                available, but the majority have suffered alteration in some form,
                                by injected humour.</p>
                            <span class="download-files">
                                <span class="download">
                                    <span class="file">
                                        <i class="ri-file-zip-line"></i>
                                    </span>
                                    <a href="javascript:void(0)"><i class="ri-download-2-line"></i></a>
                                </span>
                                <span class="download">
                                    <span class="file">
                                        <i class="ri-file-text-line"></i>
                                    </span>
                                    <a href="javascript:void(0)"><i class="ri-download-2-line"></i></a>
                                </span>
                                <span class="download">
                                    <span class="file">
                                        <i class="ri-file-ppt-line"></i>
                                    </span>
                                    <a href="javascript:void(0)"><i class="ri-download-2-line"></i></a>
                                </span>
                            </span>
                        </li>
                        <li>
                            <span class="date-time">5 Mon<span class="time">3:30 AM - 4:00 PM
                                </span></span>
                            <p class="title">Meeting with mr. Ken doe</p>
                            <p class="detail">The majority have suffered alteration in some form,
                                by injected humour.</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>