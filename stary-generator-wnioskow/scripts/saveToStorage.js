const getDataFromForm = () => {
  const data = Array.from(document.querySelectorAll('.form-data'));

  let dataObject = [];
  let achievements = [];

  data.forEach((field) => {
    if (!field.dataset.name.includes('achievement')) {
      dataObject = [...dataObject, { name: field.dataset.name, value: field.value }];
    } else {
      const dates = Array.from(field.parentNode.querySelectorAll('input[type="date"]'));

      achievements = [
        ...achievements,
        {
          name: field.dataset.name,
          startDate: dates[0].value || '',
          endDate: dates[1].value || '',
          value: field.value || '',
        },
      ];
    }
  });

  return [dataObject, achievements];
};

export const saveToStorage = () => {
  const [data, achievements] = getDataFromForm();
  localStorage.setItem('data', JSON.stringify(data));
  localStorage.setItem('achievements', JSON.stringify(achievements));
};
