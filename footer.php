<footer class="footer">
	<?php wp_nav_menu(); ?>
	<div class="footer__sub">
		<div class="footer__sub__company">
			<p class="footer__sub__company__logo"><?php bloginfo('name') ?></p>
			<address class="footer__sub__company__address">
				<p>
					<span class="footer__sub__company__address__post">123-4567</span>
					最新県さいしん市新区サイシン8-90
					<span class="footer__sub__company__address__tel">TEL：012-3456-7890</span>
				</p>
			</address>
		</div>
		<small class="footer__sub__copyright"><?php bloginfo('name') ?> <?php echo get_copyright_date(2019); ?> all right reserved</small>
	</div>
</footer>
<script src="https://unpkg.com/swiper/js/swiper.min.js"></script>
<?php wp_footer() ?>
</body>

</html>