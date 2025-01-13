


<div class="container-fluid my-5">
    <h4 class="my-4 mx-2">پنل تنظیمات قالب</h4>
    <div class="row">
            <div class="col-2 py-3">
                    <div class="nav flex-column nav-pills  me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">تنظیمات عمومی</button>
                        <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">تنظیمات فوتر</button>
                        <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">شبکه های اجتماعی</button>
                        <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</button>
                    </div>
            </div>
            <div class="col-10">
                <div class="tab-content bg-light p-3" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <form action="options.php" method="post">
                            <h6 class="alert alert-info mb-5">لوگوی سایت</h6>
                            <div  class="mb-3">
                                <label for="title-one" class="form-label">لینک لوگو</label>
                                <input type="url" class="form-control " id="title-one" placeholder="logo URL ...">
                            </div>
                            <h6 class="alert alert-info my-5">آیکون مرورگر ( favicon )</h6>
                            <div class="mb-3">
                                <label for="title-one" class="form-label">لینک آیکون مرورگر</label>
                                <input type="url" class="form-control" id="title-one">
                            </div>
                            <h6 class="alert alert-info my-5">عناوین سایت</h6>
                            <div class="mb-3">
                                <label for="title-one" class="form-label">عنوان اصلی</label>
                                <input type="text" class="form-control" id="title-one">
                            </div>
                            <div class="mb-3">
                                <label for="title-two" class="form-label">عنوان فرعی</label>
                                <input type="text" class="form-control" id="title-two">
                            </div>
                                <h6 class="alert alert-info my-5">مزایای شرکت در دوره های آموزشی</h6>
                          <div class="row">
                              <div class="mb-3 col-sm-4">
                                  <label for="title-one" class="form-label">عنوان اول</label>
                                  <input type="text" class="form-control" id="title-one">
                              </div>
                              <div class="mb-3 col-sm-8">
                                  <label for="title-two" class="form-label">توضیحات</label>
                                  <input type="text" class="form-control" id="title-two">
                              </div>
                              <div class="mb-3 col-sm-4">
                                  <label for="title-one" class="form-label">عنوان دوم</label>
                                  <input type="text" class="form-control" id="title-one">
                              </div>
                              <div class="mb-3 col-sm-8">
                                  <label for="title-two" class="form-label">توضیحات</label>
                                  <input type="text" class="form-control" id="title-two">
                              </div>
                              <div class="mb-3 col-sm-4">
                                  <label for="title-one" class="form-label">عنوان سوم</label>
                                  <input type="text" class="form-control" id="title-one">
                              </div>
                              <div class="mb-3 col-sm-8">
                                  <label for="title-two" class="form-label">توضیحات</label>
                                  <input type="text" class="form-control" id="title-two">
                              </div>
                          </div>
                                <h6 class="alert alert-info my-5">کپی رایت</h6>
                                <div class="mb-3">
                                    <label for="title-one" class="form-label">کپی رایت</label>
                                    <input type="text" class="form-control" id="title-one">
                                </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <?php submit_button(); ?>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">...</div>
                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...</div>
                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
                </div>
            </div>
        </div>
    </div>