@extends('frontend-client.layouts.app-putih')

@section('content')
<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 ftco-animate">
                <h2 class="mb-3">{{$artikel->judul}}</h2>
                <div style="font-size: 16px"><span class="icon-calendar"></span> {{date(' d M Y', strtotime($artikel->release_date))}} &bull;<span class="icon-person"></span> Oleh {{$artikel->user->nama_lengkap}}</div>

                <p>
                    <img src="{{ asset($artikel->image) }}" alt="" class="img-fluid" />
                </p>
                <p>{{$artikel->content}}</p>
                <p>
                    Molestiae cupiditate inventore animi, maxime sapiente optio, illo est nemo veritatis repellat sunt
                    doloribus nesciunt! Minima laborum
                    magni reiciendis qui voluptate quisquam voluptatem soluta illo eum ullam incidunt rem assumenda
                    eveniet eaque sequi deleniti tenetur
                    dolore amet fugit perspiciatis ipsa, odit. Nesciunt dolor minima esse vero ut ea, repudiandae
                    suscipit!
                </p>

                <p>
                    Temporibus ad error suscipit exercitationem hic molestiae totam obcaecati rerum, eius aut, in.
                    Exercitationem atque quidem tempora
                    maiores ex architecto voluptatum aut officia doloremque. Error dolore voluptas, omnis molestias odio
                    dignissimos culpa ex earum nisi
                    consequatur quos odit quasi repellat qui officiis reiciendis incidunt hic non? Debitis commodi aut,
                    adipisci.
                </p>

                <p>
                    Quisquam esse aliquam fuga distinctio, quidem delectus veritatis reiciendis. Nihil explicabo quod,
                    est eos ipsum. Unde aut non tenetur
                    tempore, nisi culpa voluptate maiores officiis quis vel ab consectetur suscipit veritatis nulla quos
                    quia aspernatur perferendis, libero
                    sint. Error, velit, porro. Deserunt minus, quibusdam iste enim veniam, modi rem maiores.
                </p>
                <p>
                    Odit voluptatibus, eveniet vel nihil cum ullam dolores laborum, quo velit commodi rerum eum quidem
                    pariatur! Quia fuga iste tenetur,
                    ipsa vel nisi in dolorum consequatur, veritatis porro explicabo soluta commodi libero voluptatem
                    similique id quidem? Blanditiis
                    voluptates aperiam non magni. Reprehenderit nobis odit inventore, quia laboriosam harum excepturi
                    ea.
                </p>
                <p>
                    Adipisci vero culpa, eius nobis soluta. Dolore, maxime ullam ipsam quidem, dolor distinctio
                    similique asperiores voluptas enim,
                    exercitationem ratione aut adipisci modi quod quibusdam iusto, voluptates beatae iure nemo itaque
                    laborum. Consequuntur et pariatur
                    totam fuga eligendi vero dolorum provident. Voluptatibus, veritatis. Beatae numquam nam ab
                    voluptatibus culpa, tenetur recusandae!
                </p>

                <div class="tag-widget post-tag-container mb-5 mt-5">
                    <div class="tagcloud">
                        <a href="#" class="tag-cloud-link">Hukum</a>
                        <a href="#" class="tag-cloud-link">Bantuan</a>
                        <a href="#" class="tag-cloud-link">New Normal</a>
                        <a href="#" class="tag-cloud-link">Lawyer</a>
                    </div>
                </div>

                <div class="pt-5 mt-5">
                    <div class="row mb-4">
                        <div class="col-2 text-center"><span class="icon-heart"></span> 30 Suka</div>
                        <div class="col-3 text-center"><span class="icon-chat"></span> 6 Komentar</div>
                        <div class="col-2">
                            <a href="#" style="color: darkgray"><i class="fa fa-share-alt"></i></a>
                        </div>
                    </div>
                    <!-- <h5 class="mb-5"><span class="icon-heart"></span> 30 likes <span class="icon-chat"></span> 6 Comments</h5> -->
                    <ul class="comment-list">
                        <li class="comment">
                            <div class="vcard bio">
                                <img src="{{url('public/plugins/frontend')}}/images/person_1.jpg" alt="Image placeholder" />
                            </div>
                            <div class="comment-body">
                                <h3>John Doe</h3>
                                <div class="meta">03 Oktober 2020 14:41</div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum
                                    necessitatibus, ipsam impedit vitae autem, eum
                                    officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit
                                    necessitatibus, nihil?
                                </p>
                            </div>
                        </li>

                        <li class="comment">
                            <div class="vcard bio">
                                <img src="{{url('public/plugins/frontend')}}/images/person_1.jpg" alt="Image placeholder" />
                            </div>
                            <div class="comment-body">
                                <h3>John Doe</h3>
                                <div class="meta">03 Oktober 2020 14:41</div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum
                                    necessitatibus, ipsam impedit vitae autem, eum
                                    officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit
                                    necessitatibus, nihil?
                                </p>
                            </div>
                        </li>

                        <li class="comment">
                            <div class="vcard bio">
                                <img src="{{url('public/plugins/frontend')}}/images/person_1.jpg" alt="Image placeholder" />
                            </div>
                            <div class="comment-body">
                                <h3>John Doe</h3>
                                <div class="meta">03 Oktober 2020 14:41</div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum
                                    necessitatibus, ipsam impedit vitae autem, eum
                                    officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit
                                    necessitatibus, nihil?
                                </p>
                            </div>
                        </li>
                    </ul>
                    <!-- END comment-list -->

                    <div class="comment-form-wrap pt-5">
                        <h3 class="mb-5">Tinggalkan Komentar</h3>
                        <form action="#" class="p-5 bg-light">
                            <div class="form-group">
                                <label for="message">Komentar</label>
                                <textarea name="" id="message" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Post" class="btn py-3 px-4 btn-primary" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 sidebar ftco-animate">
                <div class="sidebar-box">
                    <form action="#" class="search-form">
                        <div class="form-group">
                            <span class="icon icon-search"></span>
                            <input type="text" class="form-control" placeholder="Cari Berita Disini" />
                        </div>
                    </form>
                </div>

                <div class="sidebar-box ftco-animate">
                    <h3 class="heading-sidebar">Artikel Lainnya</h3>
                    @foreach ($artikels as $a)
                    <div class="block-21 mb-4 d-flex">
                        <a class="blog-img mr-4" style="background-image: url('{{ asset($a->image) }}')"></a>
                        <div class="text">
                            <h3 class="heading"><a href="#">{{$a->judul}}</a>
                            </h3>
                            <div class="meta">
                                <div>
                                    <a href="#"><span class="icon-calendar"></span> {{date(' d M Y', strtotime($a->release_date))}}</a>
                                </div>
                                <div>
                                    <a href="#"><span class="icon-person"></span> Admin</a>
                                </div>
                                <div>
                                    <a href="#"><span class="icon-chat"></span> 19</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection