Donate Bitcoin:  
<script src="<?php echo plugins_url( '/js/donate.js', __FILE__ ) ?>"></script>
<script>
	CoinWidgetCom.go({
		wallet_address: "1MeQSZomWjpdf4QCe6wpG9abDyN6xwEFrA"
		, currency: "bitcoin"
		, counter: "count"
		, alignment: "br"
		, qrcode: true
		, auto_show: false
		, lbl_button: "Donate"
		, lbl_address: "The Plugin Factory Bitcoin Address:"
		, lbl_count: "donations"
		, lbl_amount: "BTC"
	});
</script>