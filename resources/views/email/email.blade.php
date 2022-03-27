<did>Chào bạn, {{$c_name}}</did>
<p>Cảm ơn bạn đã đặt hàng tại MyStore!</p> 
<p>Email này là để xác nhận đơn hàng vừa rồi của bạn.</p>
<p>Đơn hàng của bạn bao gồm {{Session('cart')->totalQty}} sản phẩm. </p>
<p>Tổng tiền chưa khuyến mãi là: <b>{{number_format(Session('cart')->totalPrice)}} vnđ</b>.
<p>Tổng tiền thanh toán là: <b>{{number_format(Session('cart')->promtPrice)}} vnđ</b>.
<br></p>
<p>Hotline: 19006868 để liên hệ với cửa hàng khi cần thiết</p>
<p>Cảm ơn bạn đã tin tưởng và lựa chọn MyStore ! Vui lòng nhấp vào <a href="#">Links</a> để xác nhận đơn hàng</p>