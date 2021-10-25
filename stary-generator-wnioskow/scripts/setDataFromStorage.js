import { addAchievement } from './add-achievement.js';

export const setDataFromStorage = () => {
  if (!localStorage) return;

  // skip refilling the fields when the data in query params is given
  if (window.location.search !== '') return;

  if (localStorage.data) {
    const data = JSON.parse(localStorage.data);
    const formFields = Array.from(document.querySelectorAll('input[class="form-data"]'));
    formFields.forEach((field) => {
      const dataFieldFromStorage = data.find((record) => record.name === field.dataset.name);
      field.value = dataFieldFromStorage.value || '';
    });
  }

  if (localStorage.achievements) {
    const achievements = JSON.parse(localStorage.achievements);

    for (let i = 0; i < achievements.length - 1; i += 1) {
      addAchievement();
    }

    const achievementsFields = Array.from(document.querySelectorAll('textarea[class="wideField form-data"]'));
    achievementsFields.forEach((field) => {
      const achievementFieldFromStorage = achievements.find((record) => record.name === field.dataset.name);

      const fieldDates = Array.from(
        field.parentNode.querySelector('.achievement-field-dates').querySelectorAll('input')
      );

      field.value = achievementFieldFromStorage.value;
      fieldDates[0].value = achievementFieldFromStorage.startDate;
      fieldDates[1].value = achievementFieldFromStorage.endDate;
    });
  }
};
