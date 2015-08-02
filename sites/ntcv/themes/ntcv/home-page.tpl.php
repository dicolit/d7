<div class="hide-for-small">
      <div id="featured">
        <img alt="slide image" src="<?php print base_path().path_to_theme();?>/img/top-banner.jpg" width="100%">
      </div>
    </div>
    <div class="row show-for-small">
      <div class="small-12">
      <img alt="slide image" src="<?php print base_path().path_to_theme();?>/img/top-banner-small.jpg" width="100%">
      </div>
    </div>

    <div class="row">
      <hr>
      <div class="large-9 columns">
        <h4 class="block-title">Giới thiệu</h4>
        <p>Đây là những sản phẩm do mình làm trong thời gian rảnh, phần lớn là cho người thân và bạn bè. Mục đích chính là để xả stress và sau đó là để phát triển một số sản phẩm của cá nhân</p>
        <p>Các bạn có chung sở thích cùng mình đều có thể tham gia!</p>
        <i class="fi-social-twitter"></i>
      </div>
      <div class="large-3 columns hide-for-small">
        <img alt="slide image" src="<?php print base_path().path_to_theme();?>/img/nghe-thuat-chu-viet.png" width="100%">
      </div>
    </div>

    <div class="row">
      <hr>
      <div class="large-12 columns">
        <h4 class="block-title">Sản phẩm mới nhất</h4>
        <p>Đây là những sản phẩm mới nhất được thiết kế bởi Nghệ Thuật Chữ Viết!</p>
        <ul class="clearing-thumbs small-block-grid-2 medium-block-grid-2 large-block-grid-6">
          <?php foreach($data['hot_items'] as $item):?>
          <li>
            <a class="th [radius]" href="<?php print $item->href;?>">
              <?php print $item->thumb;?>
            </a>
          </li>
          <?php endforeach;?>
        </ul>
        <p><a class="right button tiny" href="<?php print url('node');?>">>> Xem tất cả</a>
        </div>
      </div>

      <div class="row">
        <div class="large-12 columns">
          <br>
          <div class="row">

            <div class="large-8 columns">
              <div class="panel radius">
                <div class="row">
                  <div class="large-6 small-6 columns">
                      <h4 class="block-title">Cộng đồng chữ viết</h4>
                      <p><strong>Bạn có muốn một chữ viết cá tính mang tên mình? Hãy đăng ký với chúng tôi!</strong></p>
                    <div class="show-for-small" style="text-align: center">
                      <a class="small radius button" href="<?php print url('request/0/edit');?>">Chữ viết bạn muốn?</a><br>
                      <a class="small radius button" href="<?php print url('request');?>">Xem chữ viết đã đăng ký</a><br>
                      <a class="small radius button" href="<?php print url('cong-tac-vien.html');?>">Giúp đỡ chúng tôi</a>
                    </div>
                  </div>
                  <div class="large-6 small-6 columns">
                    <p>Hiện tại chúng tôi chỉ nhận:</p>
                    <ul>
                     <li>
                      Tên riêng Tiếng Việt 1 ký tự
                    </li>
                    <li>
                      Tên tổ chức
                    </li>
                    <li>
                      Logo
                    </li>
                  </ul>
                </div>
              </div>
              <div>
                <hr>
                **Nếu có yêu cầu đặc biệt hãy gửi yêu cầu cho chúng tôi qua <a href="<?php print url('contact');?>">trang liên hệ</a>.
              </div>
            </div>

          </div>
          <div class="large-4 columns hide-for-small">
            <a href="<?php print url('request/0/edit');?>">
              <div class="panel radius callout" style="text-align: center">
                <strong>Chữ viết bạn muốn?</strong>
              </div></a>
              <a href="<?php print url('request');?>">
                <div class="panel radius callout" style="text-align: center">
                  <strong>Xem chữ viết đã đăng ký</strong>
                </div></a>
                <a href="<?php print url('cong-tac-vien.html');?>">
                  <div class="panel radius callout" style="text-align: center">
                    <strong>Giúp đỡ chúng tôi?</strong>
                  </div></a>
                </div>
              </div>
            </div>
          </div>
