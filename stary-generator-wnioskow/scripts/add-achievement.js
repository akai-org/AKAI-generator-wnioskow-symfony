import { removeAchievement } from './remove-achievement.js';
import { saveToStorage } from './saveToStorage.js';

export const addAchievement = () => {
  const achievements = Array.from(document.querySelectorAll('.achievement-field'));

  const newAchievement = document.createElement('div');
  newAchievement.classList.add('achievement-field');

  newAchievement.innerHTML = `<textarea class="wideField form-data" name="achievement[${achievements.length}][name]" class="form-data"
data-name="achievement[${achievements.length}]"></textarea>
  <div class="achievement-field-dates"><input type=date name="achievement[${achievements.length}][startDate]">
      <span> - </span> <input type=date name="achievement[${achievements.length}][endDate]">
      </div><button class="achievement-remove-button" title="usuń osiągnięcie">x</button>`;

  newAchievement.querySelector('.achievement-remove-button').addEventListener('click', (e) => {
    removeAchievement(e);
    saveToStorage(e);
  });

  Array.from(newAchievement.querySelectorAll('input, textarea')).forEach((element) =>
    element.addEventListener('change', saveToStorage)
  );

  document.querySelector('.achievement-container').appendChild(newAchievement);
};
