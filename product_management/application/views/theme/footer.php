		<hr>
		</div> <!-- /container -->
		<div class="clear-fix"></div>

		<!-- Footer Section Starts -->
		<footer id="footer-area">
			<!-- Footer Links Starts -->
			<div class="footer-links">
				<!-- Container Starts -->
				<div class="container">
					<!-- Information Links Starts -->
					<div class="col-md-2 col-sm-4 col-xs-12">
						<h5>Information</h5>
						<ul>
							<li><a href="about.html">About Us</a></li>
							<li><a href="#">Delivery Information</a></li>
							<li><a href="#">Privacy Policy</a></li>
							<li><a href="#">Terms &amp; Conditions</a></li>
						</ul>
					</div>
					<!-- Information Links Ends -->
					<!-- My Account Links Starts -->
					<div class="col-md-2 col-sm-4 col-xs-12">
						<h5>My Account</h5>
						<ul>
							<li><a href="#">My orders</a></li>
							<li><a href="#">My merchandise returns</a></li>
							<li><a href="#">My credit slips</a></li>
							<li><a href="#">My addresses</a></li>
							<li><a href="#">My personal info</a></li>
						</ul>
					</div>
					<!-- My Account Links Ends -->
					<!-- Customer Service Links Starts -->
					<div class="col-md-2 col-sm-4 col-xs-12">
						<h5>Service</h5>
						<ul>
							<li><a href="contact.html">Contact Us</a></li>
							<li><a href="#">Returns</a></li>
							<li><a href="#">Site Map</a></li>
							<li><a href="#">Affiliates</a></li>
							<li><a href="#">Specials</a></li>
						</ul>
					</div>
					<!-- Customer Service Links Ends -->
					<!-- Follow Us Links Starts -->
					<div class="col-md-2 col-sm-4 col-xs-12">
						<h5>Follow Us</h5>
						<ul>
							<li><a href="#">Facebook</a></li>
							<li><a href="#">Twitter</a></li>
							<li><a href="#">RSS</a></li>
							<li><a href="#">YouTube</a></li>
						</ul>
					</div>
					<!-- Follow Us Links Ends -->
					<!-- Contact Us Starts -->
					<div class="col-md-4 col-sm-8 col-xs-12 last">
						<h5>Contact Us</h5>
						<ul>
							<li>My Company</li>
							<li>
								1247 LB Nagar Road, Hyderabad, Telangana - 35
							</li>
							<li>
								Email: <a href="#">info@demolink.com</a>
							</li>								
						</ul>
						<h4 class="lead">
							Tel: <span>1(234) 567-9842</span>
						</h4>
					</div>
					<!-- Contact Us Ends -->
				</div>
				<!-- Container Ends -->
			</div>
			<!-- Footer Links Ends -->
			<!-- Copyright Area Starts -->
			<div class="copyright">
				<!-- Container Starts -->
				<div class="container">
					<!-- Starts -->
					<p class="pull-left">
						&copy; <?php echo date('Y'); ?> Line Stores. Designed By <a href="">Sanket Jadav</a>
					</p>
					<!-- Ends -->
					<!-- Payment Gateway Links Starts -->
					<ul class="pull-right list-inline">
						<li>
							<?php echo img(base_url().'/assets/img/payment-icon/cirrus.png', FALSE, array('alt' => 'PaymentGateway')); ?>
						</li>
						<li>
							<?php echo img(base_url().'/assets/img/payment-icon/paypal.png', FALSE, array('alt' => 'PaymentGateway')); ?>
						</li>
						<li>
							<?php echo img(base_url().'/assets/img/payment-icon/visa.png', FALSE, array('alt' => 'PaymentGateway')); ?>
						</li>
						<li>
							<?php echo img(base_url().'/assets/img/payment-icon/mastercard.png', FALSE, array('alt' => 'PaymentGateway')); ?>
						</li>
						<li>
							<?php echo img(base_url().'/assets/img/payment-icon/americanexpress.png', FALSE, array('alt' => 'PaymentGateway')); ?>
						</li>
					</ul>
					<!-- Payment Gateway Links Ends -->
				</div>
				<!-- Container Ends -->
			</div>
			<!-- Copyright Area Ends -->
		</footer>
		<!-- Footer Section Ends -->

		<script src="<?php echo base_url('assets/js/jquery.highlight.js');?>"></script>
		<script src="<?php echo base_url('assets/js/jquery.touchSwipe.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/jquery.randomColor.js');?>"></script>
		<script src="<?php echo base_url('assets/js/alinea.js');?>"></script>

		<script type="text/javascript">
			$(function () {
				$('[data-toggle="tooltip"]').tooltip()
			});

			// Starrr plugin (https://github.com/dobtco/starrr)
			var __slice = [].slice;

			(function($, window) {
				var Starrr;

				Starrr = (function() {
					Starrr.prototype.defaults = {
						rating: void 0,
						numStars: 5,
						change: function(e, value) {}
					};

					function Starrr($el, options) {
						var i, _, _ref,
							_this = this;

						this.options = $.extend({}, this.defaults, options);
						this.$el = $el;
						_ref = this.defaults;
						for (i in _ref) {
							_ = _ref[i];
							if (this.$el.data(i) != null) {
								this.options[i] = this.$el.data(i);
							}
						}
						this.createStars();
						this.syncRating();
						this.$el.on('mouseover.starrr', 'i', function(e) {
							return _this.syncRating(_this.$el.find('i').index(e.currentTarget) + 1);
						});
						this.$el.on('mouseout.starrr', function() {
							return _this.syncRating();
						});
						this.$el.on('click.starrr', 'i', function(e) {
							return _this.setRating(_this.$el.find('i').index(e.currentTarget) + 1);
						});
						this.$el.on('starrr:change', this.options.change);
					}

					Starrr.prototype.createStars = function() {
						var _i, _ref, _results;

						_results = [];
						for (_i = 1, _ref = this.options.numStars; 1 <= _ref ? _i <= _ref : _i >= _ref; 1 <= _ref ? _i++ : _i--) {
							_results.push(this.$el.append("<i class='fa fa-star-o'></i>"));
						}
						return _results;
					};

					Starrr.prototype.setRating = function(rating) {
						if (this.options.rating === rating) {
							rating = void 0;
						}
						this.options.rating = rating;
						this.syncRating();
						return this.$el.trigger('starrr:change', rating);
					};

					Starrr.prototype.syncRating = function(rating) {
						var i, _i, _j, _ref;

						rating || (rating = this.options.rating);
						if (rating) {
							for (i = _i = 0, _ref = rating - 1; 0 <= _ref ? _i <= _ref : _i >= _ref; i = 0 <= _ref ? ++_i : --_i) {
								this.$el.find('i').eq(i).removeClass('fa-star-o').addClass('fa-star');
							}
						}
						if (rating && rating < 5) {
							for (i = _j = rating; rating <= 4 ? _j <= 4 : _j >= 4; i = rating <= 4 ? ++_j : --_j) {
								this.$el.find('i').eq(i).removeClass('fa-star').addClass('fa-star-o');
							}
						}
						if (!rating) {
							return this.$el.find('i').removeClass('fa-star').addClass('fa-star-o');
						}
					};

					return Starrr;

				})();
				return $.fn.extend({
					starrr: function() {
						var args, option;

						option = arguments[0], args = 2 <= arguments.length ? __slice.call(arguments, 1) : [];
						return this.each(function() {
							var data;

							data = $(this).data('star-rating');
							if (!data) {
								$(this).data('star-rating', (data = new Starrr($(this), option)));
							}
							if (typeof option === 'string') {
								return data[option].apply(data, args);
							}
						});
					}
				});
			})(window.jQuery, window);

			$(function() {
				return $(".starrr").starrr();
			});

			$( document ).ready(function() {
				  
				$('#stars').on('starrr:change', function(e, value){
					$('#count').html(value);
				});			  
				$('#stars-existing').on('starrr:change', function(e, value){
					$('#count-existing').html(value);
				});
				
			});
		</script>
	</body>
</html>