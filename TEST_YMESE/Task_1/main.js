function findIndex(nums,target) {
    const lengthArr = nums.length;
    let result = [];
    for(var i = 0;i < lengthArr;i++) {
      for(var j = i+1;j < lengthArr;j++) {
        if(nums[i] + nums[j] === target) {
          result.push([i,j]);
        }
      }
    }
    return result;
  }
  var arr = [1,2,3,3,4,5,6,7,8,9];
  findIndex(arr,10)
  