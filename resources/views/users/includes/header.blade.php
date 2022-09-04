<nav
    class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light bg-info navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mobile-menu d-md-none mr-auto"><a
                        class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                            class="ft-menu font-large-1"></i></a></li>
                <li class="nav-item">
                    <a style="width: 100%" class="navbar-brand" href="">


                    </a>
                </li>
                <li class="nav-item d-md-none">
                    <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i
                            class="la la-ellipsis-v"></i></a>
                </li>
            </ul>
        </div>
        <div class="navbar-container content">
            <div class="collapse navbar-collapse" id="navbar-mobile">
                <ul class="nav navbar-nav mr-auto float-left">
                    <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs"
                                                              href="#"><i class="ft-menu"></i></a></li>
                    <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i
                                class="ficon ft-maximize"></i></a></li>
                </ul>


                <ul class="nav navbar-nav float-right">
                    <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                <span class="mr-1">
                     Welcome
                  <span
                      style="margin-left: 3px"  class="user-name text-bold-700">  </span>

                </span>

                        </a>

                            <div class="dropdown-divider"></div>


                    </li>
                    <ul class="nav navbar-nav float-right">
                        <li class="dropdown dropdown-user nav-item">
                            <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                <span class="mr-1">
                  <span
                      class="user-name text-bold-700">  {{App::getLocale()}}</span>
                </span>

                            </a>
                            <div class="dropdown-menu dropdown-menu-right">

                                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                                    <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
                                       href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                        {{ $properties['native'] }}
                                    </a>

                                    <div class="dropdown-divider"></div>
                                @endforeach
                            </div>
                        </li>




                    </ul>
                    <li class="dropdown dropdown-notification nav-item">
                        <a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon ft-bell"></i>
                            <span class="notification-counter badge badge-pill badge-default badge-danger badge-default badge-up badge-glow" id="notifications_count">{{ auth()->user()->unreadNotifications->count() }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">

                            <li class="dropdown-menu-header">

                                  <span class="badge badge-pill badge-warning mr-auto my-auto float-left"><a
                                            href="{{route('MarkAsRead_all')}}">تعين قراءة الكل</a></span>


                            </li>

                            <li class="scrollable-container media-list w-100" id="unreadNotifications">
                                @foreach (auth()->user()->unreadNotifications as $notification)
                                <a href="{{ route('user.invoices.show', $notification->data['id']) }}">
                                    <div class="media">
                                        <div class="media-left align-self-center"><i
                                                class="ft-plus-square icon-bg-circle bg-cyan"></i></div>
                                        <div class="media-body">
                                            <h6 class="media-heading"> </h6>
                                            <p class="notification-text font-small-3 text-muted">{{ $notification->data['title'] }}</p>
                                            <small>
                                                <time class="media-meta text-muted"
                                                      datetime="2015-06-11T18:29:20+08:00">{{ $notification->created_at }}
                                                </time>
                                            </small>
                                        </div>
                                    </div>
                                </a>
                                    @endforeach





                            </li>
            </div>
        </div>
    </div>
</nav>
