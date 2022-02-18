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




window.addEventListener('load', () => {
    document.querySelector('#link').addEventListener('click', () => {
        const query = {
            leader: document.querySelector('#application_form_leader').value,
            clubname: document.querySelector('#application_form_clubname').value,
            department: document.querySelector('#application_form_department').value,
            patron: document.querySelector('#application_form_patron').value,
        };

        const queryString = getQuerStringFromObject(query);
        const link = generateLinkWithParamsString(queryString);
        copyTextToClipboard(link);
    });
});

function getQuerStringFromObject(object) {
    return Object.entries(object)
        .map((pair) => pair.map(encodeURIComponent).join('='))
        .join('&');
}

function generateLinkWithParamsString(string) {
    const baseLink = window.location.href.split('?')[0];
    return baseLink + '?' + string;
}

function copyTextToClipboard(text) {
    let textarea = document.createElement('textarea');

    textarea.style.position = 'fixed';
    textarea.style.top = 0;
    textarea.style.left = 0;
    textarea.style.width = '2em';
    textarea.style.height = '2em';
    textarea.style.padding = 0;
    textarea.style.border = 'none';
    textarea.style.outline = 'none';
    textarea.style.boxShadow = 'none';
    textarea.style.background = 'transparent';

    textarea.value = text;
    document.body.appendChild(textarea);
    textarea.focus();
    textarea.select();

    const successful = document.execCommand('copy');

    if (successful) {
        console.log('Pomyślnie skopiowano link');
    } else {
        console.error('Kopiowanie nie powiodło się. Zgłoś ten błąd na GitHubie abyśmy mogli się nim zająć!');
    }

    document.body.removeChild(textarea);
}
