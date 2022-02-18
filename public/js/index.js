const newAchievementHtml = `
                    <div class="field">
                        <div class="control">
                            <textarea id="application_form_achievements___name___name"
                            class="textarea"
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
                                class="input"
                                name="application_form[achievements][__name__][startDate]"
                                required="required"
                                />
                            </div>
                            <div class="control level-item">
                                <input id="application_form_achievements___name___endDate"
                                type="date"
                                class="input"
                                name="application_form[achievements][__name__][endDate]"
                                required="required"
                                />
                            </div>
                        </div>
                        <div class="level-right">
                            <button class="remove-achievement button" type="button">Usuń</button>
                        </div>
                    </div>
`

const addAchievement = () => {

    const achievements = document.getElementById('achievements-list')
    const counter = achievements.childElementCount;

    const newAchievement = document.createElement('li');
    newAchievement.setAttribute('id', `application_form_achievements_${counter}`)
    newAchievement.setAttribute('style', 'margin-bottom: 0.75rem')
    newAchievement.innerHTML = newAchievementHtml.replace(/__name__/g, counter.toString());
    achievements.appendChild(newAchievement);
}

const addAchievementButton = document.getElementById('add-achievement-button');

if (addAchievementButton) {
    addAchievementButton.addEventListener('click', addAchievement);
}