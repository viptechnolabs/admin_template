@extends('pages.collage.navbar')
@section('content')
    <section class="content-wrapper">
        <div class="container-fluid">
            <div class="row col-md-12">
                <div class="col-md-6 float-right">
                    <img src="https://www.mkbhavuni.edu.in/mkbhavuniweb/images/mkbu-new-name.png" alt="">

                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                @php use Illuminate\Support\Facades\Auth;$user = Auth::user() @endphp
                <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">About univercity</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong><i class="fas fa-book mr-1"></i> Education</strong>

                            <p class="text-muted">
                                B.S. in Computer Science from the University of Tennessee at Knoxville
                            </p>

                            <hr>

                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                            <p class="text-muted">{{ $user->collage->address }}a</p>

                            <hr>

                            <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                            <p class="text-muted">
                                <span class="tag tag-danger">UI Design</span>
                                <span class="tag tag-success">Coding</span>
                                <span class="tag tag-info">Javascript</span>
                                <span class="tag tag-warning">PHP</span>
                                <span class="tag tag-primary">Node.js</span>
                            </p>
                            <hr>
                            <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam
                                fermentum enim neque.</p>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">School?Collage/Departments</h3>
                        </div>
                        <div class="card-body box-profile">
                            <ol>
                                <li>BCA</li>
                                <li>MCA</li>
                                <li>engineering</li>
                                <li>MscIT</li>
                                <li>BBA</li>
                            </ol>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.col -->

                <div class="col-md-6">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">About univercity</h3>
                        </div>
                        <div class="card-body box-profile">
                            <p> Wikis are enabled by wiki software, otherwise known as wiki engines. A wiki engine,
                                being a form of a content management system, differs from other web-based systems such
                                as blog software, in that the content is created without any defined owner or leader,
                                and wikis have little inherent structure, allowing structure to emerge according to the
                                needs of the users.[1] Wiki engines usually allow content to be written using a
                                simplified markup language and sometimes edited with the help of a rich-text editor.[2]
                                There are dozens of different wiki engines in use, both standalone and part of other
                                software, such as bug tracking systems. Some wiki engines are open source, whereas
                                others are proprietary. Some permit control over different functions (levels of access);
                                for example, editing rights may permit changing, adding, or removing material. Others
                                may permit access without enforcing access control. Other rules may be imposed to
                                organize content.</p>
                        </div>
                        <!-- /.card-body -->
                    </div>

                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Contact & Information</h3>
                        </div>
                        <div class="card-body box-profile">
                            <p> Wikis are enabled by wiki software, otherwise known as wiki engines. A wiki engine,
                                being a form of a content management system, differs from other web-based systems such
                                as blog software, in that the content is created without any defined owner or leader,
                                and wikis have little inherent structure, allowing structure to emerge according to the
                                needs of the users.[1] Wiki engines usually allow content to be written using a
                                simplified markup language and sometimes edited with the help of a rich-text editor.[2]
                                There are dozens of different wiki engines in use, both standalone and part of other
                                software, such as bug tracking systems. Some wiki engines are open source, whereas
                                others are proprietary. Some permit control over different functions (levels of access);
                                for example, editing rights may permit changing, adding, or removing material. Others
                                may permit access without enforcing access control. Other rules may be imposed to
                                organize content.</p>
                            <p>The online encyclopedia project, Wikipedia, is the most popular wiki-based website, and
                                is one of the most widely viewed sites in the world, having been ranked in the top
                                twenty since 2007.[3] Wikipedia is not a single wiki but rather a collection of hundreds
                                of wikis, with each one pertaining to a specific language. In addition to Wikipedia,
                                there are hundreds of thousands of other wikis in use, both public and private,
                                including wikis functioning as knowledge management resources, notetaking tools,
                                community websites, and intranets. The English-language Wikipedia has the largest
                                collection of articles: as of February 2020, it has over 6 million articles. Ward
                                Cunningham, the developer of the first wiki software, WikiWikiWeb, originally described
                                wiki as "the simplest online database that could possibly work."[4] "Wiki" (pronounced
                                [wiki][note 1]) is a Hawaiian word meaning "quick.</p>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
@push('styles')
    <style>
        ol {
            padding: 20px;
            list-style-type: decimal;

        }

        /*ol li {*/
        /*    float:left;*/
        /*    margin: 0 10px;*/
        /*    padding: 0 10px;*/
        /*}*/
    </style>
@endpush
