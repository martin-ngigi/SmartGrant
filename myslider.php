<div class="slider_body">
	<div class="image-slider">
		<div class="slide active">
			<img src="images/african1.jpg" alt="">
			<div class="info">
				<h2>Slide 01</h2>
				<p>When people show loyalty to you, you take care of those who are with you. It's how it goes with everything. If you have a small circle of friends, and one of those friends doesn't stay loyal to you, they don't stay your friend for very long.</p>
			</div>
		</div>
		<div class="slide">
			<img src="images/african2.jpg" alt="">
			<div class="info">
				<h2>Slide 02</h2>
				<p>“It is an absolute human certainty that no one can know his own beauty or perceive a sense of his own worth until it has been reflected back to him in the mirror of another loving, caring human being.”</p>
			</div>
		</div>
		<div class="slide">
			<img src="images/african3.jpg" alt="">
			<div class="info">
				<h2>Slide 03</h2>
				<p>“So when you are listening to somebody, completely, attentively, then you are listening not only to the words but also to the feeling of what is being conveyed, to the whole of it, not part of it.”</p>
			</div>
		</div>
		<div class="slide">
			<img src="images/african4.jpg" alt="">
			<div class="info">
				<h2>Slide 04</h2>
				<p>“Surround yourself with people who make you happy. People who make you laugh, who help you when you’re in need. People who genuinely care. They are the ones worth keeping in your life. Everyone else is just passing through.”</p>
			</div>
		</div>
		<div class="slide">
			<img src="images/african5.jpg" alt="">
			<div class="info">
				<h2>Slide 05</h2>
				<p>“We live in a world in which we need to share responsibility. It's easy to say It's not my child, not my community, not my world, not my problem. Then there are those who see the need and respond. I consider those people my heroes.”

</p>
			</div>
		</div>
		<div class="navigation">
			<div class="btn active"></div>
			<div class="btn"></div>
			<div class="btn"></div>
			<div class="btn"></div>
			<div class="btn"></div>
		</div>
	</div>
	<script type="text/javascript">
		var slides = document.querySelectorAll('.slide');
		var btns = document.querySelectorAll('.btn');
		let currentSlide = 1;

		//javascript for image slider manual navigation
		var manualNav = function(manual){
			slides.forEach((slide) => {
				slide.classList.remove('active');

				btns.forEach((btn) =>{
					btn.classList.remove('active');
				});
			});


			slides[manual].classList.add('active');
			btns[manual].classList.add('active');
		}

		btns.forEach((btn, i) => {
			btn.addEventListener("click", ()=> {
				manualNav(i);
				currentSlide = i;
			});
		});

		//javascript for image slider autoplay navigation
		var repeat = function(activeClass){
			let active = document.getElementsByClassName('active');
			let i =1;

			var repeater = () => {
				setTimeout(function(){
					[...active].forEach((activeSlide) => {
						activeSlide.classList.remove('active');
					});

					slides[i].classList.add('active');
					btns[i].classList.add('active');
					i++;

					if (slides.length == i) {
						i=0;
					}
					if (i >= slides.length) {
						return;
					}
					repeater();
				}, 10000);
			}
			repeater();
		}
		repeat();
	</script>
</div>
