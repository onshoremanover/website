const audio = document.querySelector('.speedcontrolcontainer  audio');
const playbackrate = document.querySelector('.speedcontrolcontainer input');
const display = document.querySelector('.speedcontrolcontainer span');
const displayvalue = val => {
  return parseInt(val * 100, 10) + '%'
}
if (window.localStorage.pbspeed) {
  audio.playbackRate = window.localStorage.pbspeed;
  playbackrate.value = window.localStorage.pbspeed;
}
display.innerText = displayvalue(audio.playbackRate);
playbackrate.addEventListener('change', e => {
  audio.playbackRate = playbackrate.value;
  display.innerText = displayvalue(playbackrate.value);
  window.localStorage.pbspeed = playbackrate.value;
});