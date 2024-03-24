const express = require('express');
const bodyParser = require('body-parser');

const app = express();
app.use(bodyParser.urlencoded({ extended: true }));

let scheduledInterviews = []; 
app.post('/schedule-interview', (req, res) => {
  const { name, date } = req.body;
  const interviewDetails = { name, date };
  scheduledInterviews.push(interviewDetails);
  res.sendStatus(200); 
});

app.listen(3000, () => {
  console.log('Server is running on port 3000');
});
