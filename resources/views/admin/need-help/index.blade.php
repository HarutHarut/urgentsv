@extends('admin.layouts.app')

@section('content')
<!--faq-contant-start-->
<div class="row">
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card card-statistics faq-contant p-0 p-sm-4">
            <div class="card-body">
                <div class="tab nav-center">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active show" id="all-tab" data-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="true"> All Questions</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="front-end-tab" data-toggle="tab" href="#front-end" role="tab" aria-controls="front-end" aria-selected="false"> Web Site Front End
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="back-end-tab" data-toggle="tab" href="#back-end" role="tab" aria-controls="back-end" aria-selected="false">
                                Admin Panel Back End </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false"> Contact Us
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content" id="v-pills-tabContent">

                        <!-- All Questions -->
                        <div class="tab-pane fade show pt-20 active" id="all" role="tabpanel">
                            <div class="accordion" id="accordionsimplefill">
                                <div class="mb-2 acd-group">
                                    <div class="card-header bg-primary rounded-0">
                                        <h5 class="mb-0">
                                            <a href="#collapse" class="btn-block text-white text-left acd-heading" data-toggle="collapse">1. Quick Response Time</a>
                                        </h5>
                                    </div>
                                    <div id="collapse" class="collapse show" data-parent="#accordionsimplefill">
                                        <div class="card-body">
                                            <p>Motivation cannot be an external force, it must
                                                come from within as the natural product of your
                                                desire to achieve something and your belief
                                                that you are capable to succeed at your goal.</p>

                                        </div>
                                    </div>
                                </div>
                                <div class="mb-2 acd-group">
                                    <div class="card-header rounded-0 bg-primary">
                                        <h5 class="mb-0">
                                            <a href="#collapse2" class="btn-block text-white text-left acd-heading collapsed" data-toggle="collapse">2. Experienced
                                                Professionals</a>
                                        </h5>
                                    </div>
                                    <div id="collapse2" class="collapse" data-parent="#accordionsimplefill">
                                        <div class="card-body">
                                            <p>There are many people in the world with amazing
                                                talents who realize only a small percentage of
                                                their potential. We all know people who live
                                                this truth.</p>

                                        </div>
                                    </div>
                                </div>
                                <div class="acd-group border-bottom-0">
                                    <div class="card-header rounded-0 bg-primary">
                                        <h5 class="mb-0">
                                            <a href="#collapse3" class="btn-block text-white text-left acd-heading collapsed" data-toggle="collapse">3. Maximum Query Solved</a>
                                        </h5>
                                    </div>
                                    <div id="collapse3" class="collapse" data-parent="#accordionsimplefill">
                                        <div class="card-body">
                                            <p>Text of the printin a galley of type and bled it
                                                to a type specimen book. It has survived not
                                                only five centuries make Lorem Ipsum is simply
                                                dummy.Success isn’t really that difficult.</p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Web Site -->
                        <div class="tab-pane fade pt-20" id="front-end" role="tabpanel">
                            <div class="accordion" id="accordionsimpleborder">
                                <div class="mb-2 acd-group">
                                    <div class="card-header rounded-0 bg-primary">
                                        <h5 class="mb-0">
                                            <a href="#collapse01" class="btn-block text-left text-white acd-heading" data-toggle="collapse">1. Making the decision</a>
                                        </h5>
                                    </div>
                                    <div id="collapse01" class="collapse show" data-parent="#accordionsimpleborder">
                                        <div class="card-body">
                                            <p>
                                                We also know those epic stories, those
                                                modern-day legends surrounding the early
                                                failures of such supremely successful folks as
                                                Michael Jordan and Bill Gates. We can look a
                                                bit further back in time to Albert Einstein or
                                                even further back to Abraham Lincoln.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-2 acd-group">
                                    <div class="card-header rounded-0 bg-primary">
                                        <h5 class="mb-0">
                                            <a href="#collapse02" class="btn-block text-left text-white acd-heading collapsed" data-toggle="collapse">2. Developing the Vision</a>
                                        </h5>
                                    </div>
                                    <div id="collapse02" class="collapse" data-parent="#accordionsimpleborder">
                                        <div class="card-body">
                                            <p>
                                                Positive pleasure-oriented goals are much more
                                                powerful motivators than negative fear-based
                                                ones. Although each is successful separately,
                                                the right combination of both is the most
                                                powerful motivational force known to humankind.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="acd-group border-bottom-0">
                                    <div class="card-header rounded-0 bg-primary">
                                        <h5 class="mb-0">
                                            <a href="#collapse03" class="btn-block  text-left text-white acd-heading collapsed" data-toggle="collapse">3. Taking Action</a>
                                        </h5>
                                    </div>
                                    <div id="collapse03" class="collapse" data-parent="#accordionsimpleborder">
                                        <div class="card-body">
                                            <p>The first thing to remember about success is
                                                that it is a process – nothing more, nothing
                                                less. There is really no magic to it and it’s
                                                not reserved only for a select few people. As
                                                such, success really has nothing to do with
                                                luck, coincidence or fate. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Admin Panel -->
                        <div class="tab-pane fade pt-20" id="back-end" role="tabpanel">
                            <div class="accordion" id="accordionfillborderradius">
                                <div class="mb-2 acd-group">
                                    <div class="card-header bg-primary rounded-0">
                                        <h5 class="mb-0">
                                            <a href="#collapse3-1" class="btn-block text-white text-left acd-heading" data-toggle="collapse">1. Many Style Available</a>
                                        </h5>
                                    </div>
                                    <div id="collapse3-1" class="collapse show" data-parent="#accordionfillborderradius">
                                        <div class="card-body">
                                            <p>The sad thing is the majority of people have no
                                                clue about what they truly want. They have no
                                                clarity. When asked the question, responses
                                                will be superficial at best, and at worst, will
                                                be what someone else wants for them.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-2 acd-group">
                                    <div class="card-header bg-primary rounded-0">
                                        <h5 class="mb-0">
                                            <a href="#collapse3-2" class="btn-block text-white text-left acd-heading collapsed" data-toggle="collapse">2. Parallax Sections</a>
                                        </h5>
                                    </div>
                                    <div id="collapse3-2" class="collapse" data-parent="#accordionfillborderradius">
                                        <div class="card-body">
                                            <p>The best way is to develop and follow a plan.
                                                Start with your goals in mind and then work
                                                backwards to develop the plan. What steps are
                                                required to get you to the goals? Make the plan
                                                as detailed as possible. Try to visualize and
                                                then plan for, every possible setback.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="acd-group border-bottom-0">
                                    <div class="card-header bg-primary rounded-0">
                                        <h5 class="mb-0">
                                            <a href="#collapse3-3" class="btn-block text-white text-left acd-heading collapsed" data-toggle="collapse">3. Unlimited layouts</a>
                                        </h5>
                                    </div>
                                    <div id="collapse3-3" class="collapse" data-parent="#accordionfillborderradius">
                                        <div class="card-body">
                                            <p>Commit the plan to paper and then keep it with
                                                you at all times. Review it regularly and
                                                ensure that every step takes you closer to your
                                                Vision and Goals. If the plan doesn’t support
                                                the vision then change it!</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Contacts Us -->
                        <div class="tab-pane fade pt-20" id="contact" role="tabpanel">
                            <div class="accordion" id="accordionborderradius">
                                <div class="col-lg-6 offset-lg-3">
                                    @include('admin.layouts.support-form')
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--faq-contant-end-->
@endsection