import { addAchievement } from './add-achievement.js';
import { saveToStorage } from './saveToStorage.js';
import { setDataFromStorage } from './setDataFromStorage.js';
import './getLink.js';

document.querySelector('.add-achievement-button').addEventListener('click', addAchievement);
document.addEventListener('DOMContentLoaded', setDataFromStorage);
document.querySelector('form').addEventListener('submit', saveToStorage);
Array.from(document.querySelectorAll('input, textarea, .add-achievement-button')).forEach((element) =>
  element.addEventListener('change', saveToStorage)
);
