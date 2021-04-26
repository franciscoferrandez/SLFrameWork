<div class="loading-overlay" style="display: none">
	<div class="cssload-table">
		<div class="cssload-cell">
			<div class="cssload-gmb-loader">
				<div></div>
				<div></div>
				<div></div>
			</div>
		</div>
	</div>
</div>

<style type="text/css">

.loading-overlay {
	position: fixed;	
	top:0;
	left: 0;
	width: 100%;
	height: 100%;
	background: rgba(100,100,100,0.2);
	padding-top: 20%;
}

.cssload-gmb-loader {
	font-size: 0;
	display: inline-block;
	position: relative;
	height: 117px;
	width: 117px;
}
.cssload-gmb-loader div {
	background: rgb(0,0,0);
	width: 29px;
	height: 29px;
	border-radius: 29px;
	position: absolute;
	top: 50%;
	margin-top: -15px;
	animation: cssload-gmb-bounce 0.7875s infinite;
		-o-animation: cssload-gmb-bounce 0.7875s infinite;
		-ms-animation: cssload-gmb-bounce 0.7875s infinite;
		-webkit-animation: cssload-gmb-bounce 0.7875s infinite;
		-moz-animation: cssload-gmb-bounce 0.7875s infinite;
}
.cssload-gmb-loader div:nth-child(2) {
	left: 50%;
	margin-left: -15px;
	animation-delay: 0.1125s;
		-o-animation-delay: 0.1125s;
		-ms-animation-delay: 0.1125s;
		-webkit-animation-delay: 0.1125s;
		-moz-animation-delay: 0.1125s;
}
.cssload-gmb-loader div:nth-child(3) {
	right: 0;
	animation-delay: 0.225s;
		-o-animation-delay: 0.225s;
		-ms-animation-delay: 0.225s;
		-webkit-animation-delay: 0.225s;
		-moz-animation-delay: 0.225s;
}



.cssload-table {
	display: cssload-table;
	width: 97px;
	height: 100%;
	text-align: center;
	margin: auto;
}
.cssload-table .cssload-cell {
	display: table-cell;
	vertical-align: middle;
}

@keyframes cssload-gmb-bounce {
	10% {
		transform: translate3d(0, 29px, 0);
		animation-timing-function: cubic-bezier(0.5, 0, 0.5, 1);
		height: 29px;
	}
	14% {
		height: 88px;
	}
	15% {
		height: 29px;
		transform: translate3d(0, -58px, 0);
		animation-timing-function: cubic-bezier(0.8, 0, 0.8, 1);
	}
	35% {
		transform: translate3drgb(0,0,0);
	}
}

@-o-keyframes cssload-gmb-bounce {
	10% {
		-o-transform: translate3d(0, 29px, 0);
		-o-animation-timing-function: cubic-bezier(0.5, 0, 0.5, 1);
		height: 29px;
	}
	14% {
		height: 88px;
	}
	15% {
		height: 29px;
		-o-transform: translate3d(0, -58px, 0);
		-o-animation-timing-function: cubic-bezier(0.8, 0, 0.8, 1);
	}
	35% {
		-o-transform: translate3drgb(0,0,0);
	}
}

@-ms-keyframes cssload-gmb-bounce {
	10% {
		-ms-transform: translate3d(0, 29px, 0);
		-ms-animation-timing-function: cubic-bezier(0.5, 0, 0.5, 1);
		height: 29px;
	}
	14% {
		height: 88px;
	}
	15% {
		height: 29px;
		-ms-transform: translate3d(0, -58px, 0);
		-ms-animation-timing-function: cubic-bezier(0.8, 0, 0.8, 1);
	}
	35% {
		-ms-transform: translate3drgb(0,0,0);
	}
}

@-webkit-keyframes cssload-gmb-bounce {
	10% {
		-webkit-transform: translate3d(0, 29px, 0);
		-webkit-animation-timing-function: cubic-bezier(0.5, 0, 0.5, 1);
		height: 29px;
	}
	14% {
		height: 88px;
	}
	15% {
		height: 29px;
		-webkit-transform: translate3d(0, -58px, 0);
		-webkit-animation-timing-function: cubic-bezier(0.8, 0, 0.8, 1);
	}
	35% {
		-webkit-transform: translate3drgb(0,0,0);
	}
}

@-moz-keyframes cssload-gmb-bounce {
	10% {
		-moz-transform: translate3d(0, 29px, 0);
		-moz-animation-timing-function: cubic-bezier(0.5, 0, 0.5, 1);
		height: 29px;
	}
	14% {
		height: 88px;
	}
	15% {
		height: 29px;
		-moz-transform: translate3d(0, -58px, 0);
		-moz-animation-timing-function: cubic-bezier(0.8, 0, 0.8, 1);
	}
	35% {
		-moz-transform: translate3drgb(0,0,0);
	}
}
</style>