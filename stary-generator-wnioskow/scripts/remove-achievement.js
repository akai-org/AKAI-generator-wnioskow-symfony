export const removeAchievement = (e) => {
  e.preventDefault();

  e.target.parentNode.remove();

  const achievements = Array.from(document.querySelectorAll('.achievement-field'));

  achievements.map((achievement, index) => {
    achievement.name = `achievement[${index}]`;
    achievement.querySelector('textarea').name = `achievement[${index}][name]`;
    achievement.querySelector('textarea').dataset.name = `achievement[${index}]`;

    const dates = Array.from(achievement.querySelectorAll('input[type="date"]'));
    dates[0].name = `achievement[${index}][startDate]`;
    dates[1].name = `achievement[${index}][endDate]`;
  });
};
