const newAchievementHtml = `
                    <div class="field">
                        <div class="control">
                            <textarea id="application_form_achievements___name___name"
                            class="textarea achievement-name"
                            name="application_form[achievements][__name__][name]"
                            required="required"
                            rows="2"></textarea>
                        </div>
                    </div>
                    <div class="level">
                        <div class="level-left">
                            <div class="control level-item">
                                <input id="application_form_achievements___name___startDate"
                                type="date"
                                class="input achievement-start-date"
                                name="application_form[achievements][__name__][startDate]"
                                required="required"
                                />
                            </div>
                            <div class="control level-item">
                                <input id="application_form_achievements___name___endDate"
                                type="date"
                                class="input achievement-end-date"
                                name="application_form[achievements][__name__][endDate]"
                                required="required"
                                />
                            </div>
                        </div>
                        <div class="level-right">
                            <button class="remove-achievement button" type="button" achievement-id="__achievement__">Usuń</button>
                        </div>
                    </div>
`

const addAchievement = () => {

    const achievements = document.getElementById('achievements-list')
    const counter = achievements.childElementCount;

    const newAchievement = document.createElement('li');
    newAchievement.id = `application_form_achievements_${counter}`;
    newAchievement.class = 'achievement';
    newAchievement.style.marginBottom = '0.75rem'
    newAchievement.innerHTML = newAchievementHtml.replace(/__name__/g, counter.toString()).replace(/__achievement__/, `application_form_achievements_${counter}`);
    achievements.appendChild(newAchievement);
    newAchievement.querySelector('.remove-achievement').addEventListener('click', removeAchievement);
}

const removeAchievement = (e) => {
    const achievementId = e.target.getAttribute('achievement-id');
    const achievement = document.getElementById(achievementId);
    achievement.remove();

    const achievements = Array.from(document.getElementById('achievements-list').children)
    achievements.map((achievement, index) => {
        achievement.id = `application_form_achievements_${index}`;
        achievement.querySelector('.achievement-name').id = `application_form_achievements_${index}_name`
        achievement.querySelector('.achievement-name').name = `application_form[achievements][${index}][name]`
        achievement.querySelector('.achievement-start-date').id = `application_form_achievements_${index}_startDate`
        achievement.querySelector('.achievement-start-date').name = `application_form[achievements][${index}][startDate]`
        achievement.querySelector('.achievement-end-date').id = `application_form_achievements_${index}_endDate`
        achievement.querySelector('.achievement-end-date').name = `application_form[achievements][${index}][endDate]`
        console.log(achievement)
        console.log(index)
    })
}

const addAchievementButton = document.getElementById('add-achievement-button');

if (addAchievementButton) {
    addAchievementButton.addEventListener('click', addAchievement);
}