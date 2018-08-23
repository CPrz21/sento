var bricks = [
  {},
  {src: 'spa9.jpg'},
  {src: 'spa1.jpg'},
  {src: 'spa2.jpg'},
  {src: 'spa9.jpg'},
  {src: 'spa1.jpg'},
  {src: 'spa2.jpg'},
  {src: 'spa7.jpg'},
  {src: 'spa9.jpg'},
  {src: 'spa1.jpg'},
  {src: 'spa2.jpg'},
  {src: 'spa9.jpg'},
  {src: 'spa1.jpg'},
  {src: 'spa2.jpg'},
  {src: 'spa14.jpg'},

  {src: 'spa9.jpg'},
  {src: 'spa1.jpg'},
  {src: 'spa2.jpg'},
             ];

var bricksColumns={};
var brick = bricks.slice(8,15);
var total = Math.ceil(bricks.length/7);
  var brickId=1,
      numInicio=1,
      numFin=8;


for (var i=0; i < total; i++)
{
  bricksColumns['brick'+brickId]=bricks.slice(numInicio,numFin);

  //console.log(bricks.slice(numInicio,numFin));
  //console.log(brickId+' '+numInicio+' '+numFin);
  //console.log('brick-'+brickId+'('+numInicio+','+numFin+')');
  brickId=brickId+1;
  numInicio=numInicio+7;
  numFin=numFin+7;


}

for (var ii=0; ii < total+1; ii++)
{
  if (ii!=0){
    console.log(bricksColumns['brick'+1]);
  }


}



//console.log(bricksColumns.brick1);
