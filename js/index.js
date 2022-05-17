const hero = document.querySelector("#hero");
let number = 1;
let random;
const fotos = 6;
hero.style.backgroundImage = `url(./img/${number}.jpg)`;

aleatorio(fotos, 1);

function aleatorio(max, min) {
	random = Math.round(Math.random() * (max - min) + min);
	if (number === random) {
		number = number - 1;
		if (number < 1) {
			number = number + 1;
		}
	} else {
		number = random;
	}
	hero.style.backgroundImage = `url(./img/${number}.jpg)`;
}
