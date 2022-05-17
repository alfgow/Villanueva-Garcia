const hero = document.querySelector("#hero");
let number = 1;
let random;
const fotos = 6;
hero.style.backgroundImage = `url(./img/${number}.jpg)`;

aleatorio();

function aleatorio() {
	setInterval(() => {
		random = Math.round(Math.random() * (6 - 1) + 1);
		if (number === random) {
			number = number - 1;
		} else {
			number = random;
		}
		hero.style.backgroundImage = `url(./img/${number}.jpg)`;
		console.log(number);
	}, 3000);
}
