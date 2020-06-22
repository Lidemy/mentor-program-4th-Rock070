
function countStep(arr){
    var k=[]
    for(var i=0;i<10;i++){
       
        k.push(arr[i].split(""))
    }

    var step=0;
    var nowrow=9
    var nowcol=9
    do{
        // console.log('nowrow: '+nowrow+' nowcol: '+nowcol)

        if(nowrow!=0 && k[nowrow-1][nowcol]== "."){
        k[nowrow][nowcol]="#"
        step++;
        nowrow--;
        }else if(nowcol !=0 && k[nowrow][nowcol-1]=="."){
            k[nowrow][nowcol]="#"
            step++;
            nowcol--;
        }else if(nowcol !=9 && k[nowrow][nowcol+1]=="."){
            k[nowrow][nowcol]="#"
            step++;
            nowcol++;
        }
    }while(nowcol >0 || nowrow >0 )
    
    return step

}



console.log(
    countStep(
    [
	'.#########',
	'.........#',
	'########.#',
	'#........#',
	'#.########',
	'#........#',
	'########.#',
	'#........#',
	'#.######.#',
	'########..'
    ]
    )
)

console.log(
    countStep(
        [
            '..########',
            '#........#',
            '###..#..##',
            '#....#..##',
            '#..###...#',
            '#.#..#...#',
            '#.#....#.#',
            '#.####...#',
            '#.....#..#',
            '########..'
        ]
    )
)