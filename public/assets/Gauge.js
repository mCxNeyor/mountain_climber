//
// function gauge() {
//     $.ajax({
//         url: "{{ route('display') }}",
//         type: 'GET',
//         dataType: 'json',
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         },
//         success: function(data) {
//             ('#example').simpleGauge({
//
//                 // gauge type
//                 type: 'analog digital',
//                 value: data.sound,
//                 // container styles
//                 container: {
//                     style: {},
//                     size: 90
//                 },
//
//                 // gauge title
//                 title: {
//                     text: '',
//                     style: {
//                         padding: '5px 7px',
//                         'font-size': '30px'
//                     }
//                 },
//
//                 // digital gauge options
//                 digital: {
//                     text: '{value.1}',
//                     style: {
//                         padding: '5px 7px',
//                         color: 'auto',
//                         'font-size': '25px',
//                         'font-family': '"Digital Dream Skew Narrow","Helvetica Neue",Helvetica,Arial,sans-serif',
//                         'text-shadow': '#999 2px 2px 4px'
//                     }
//                 },
//
//                 // analog gauge options
//                 analog: {
//                     numTicks: 10,
//                     minAngle: 150,
//                     maxAngle: 390,
//                     lineWidth: 10,
//                     arrowWidth: 10,
//                     arrowColor: '#486e85',
//                     inset: false
//                 },
//
//                 // bar colors
//                 barColors: [
//                     [ 0,  '#666' ],
//                     [ 50, '#ffa500' ],
//                     [ 90, '#e01010' ]
//                 ],
//
//             });
//         },
//         error: function(data){
//             console.log(data);
//
//         }
//     });
// }
//
// updateData();
// setInterval(() => {
//     gauge();
// });
//
//
//
