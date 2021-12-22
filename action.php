'use strict';

const fs = require('fs');

let student = {
    name: 'Mike',
    age: 25, 
    gender: 'Male',
    department: 'English',
    car: 'Honda' 
};

let data = JSON.stringify(student);  

fs.writeFileSync('file.json', data, finished);

function finished(err)
{
    console.log('success');
}