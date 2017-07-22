<?php use Cake\Core\Configure; ?>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
              <div class="title_left">
                <h3>Affiliate Details</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_content">
                            <section class="content">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <p><strong>Name: </strong><?php echo $user->firstname.' '.$user->lastname; ?></p>
                                        <p><strong>Email: </strong><?php echo $user->email; ?></p>
                                        <p><strong>Username: </strong><?php echo $user->username; ?></p>
                                        <p><strong>Registered: </strong><?php echo $user->created; ?></p>
                                    </div>
                                    <div class="col-sm-4">
                                        <p><strong>Address: </strong><?php echo $user->user_profile->address; ?></p>
                                        <p><strong>City/Town: </strong><?php echo $user->user_profile->city; ?></p>
                                        <p><strong>State: </strong><?php echo $user->user_profile->state; ?></p>
                                        <p><strong>Country: </strong><?php echo Configure::read('countriesIsoName')[$user->user_profile->country]; ?></p>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>