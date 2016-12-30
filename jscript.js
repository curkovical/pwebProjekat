$(document).ready(function(){		
			var i=0, j=0, k=0;
			
			$('#title').click(function(){
				$('#main1').css('background-image','url("backgr.jpg")');
				$('#serv').hide();
				$('#team').hide();
				$('#eIns').hide();				
				$('#inno').hide();
				$('#career').hide();
				$('#cont').hide();
				$('#servLink').css('color','white');
				$('#eInsLink').css('color','white');
				$('#innoLink').css('color','white');
				$('#carLink').css('color','white');
				$('#conLink').css('color','white');
				$('#teamLink').css('color','white');
				$('#purple').css('opacity', '0.5');
			});
			
			$('#servLink').click(function(){	
				$('#servLink').css('color','black');
				$('#teamLink').css('color','white');
				$('#eInsLink').css('color','white');
				$('#innoLink').css('color','white');
				$('#carLink').css('color','white');
				$('#conLink').css('color','white');
				$('#eIns').hide();
				$('#team').hide();
				$('#inno').hide();
				$('#career').hide();
				$('#cont').hide();
				$('#serv').show();				
				$('#purple').css('opacity', '1');
				$('#purple').css('background-color', '#8984AA');
				$('#main1').css('background-image','none');
			});
			
			$('#teamLink').click(function(){	
				$('#teamLink').css('color','black');
				$('#servLink').css('color','white');				
				$('#eInsLink').css('color','white');
				$('#innoLink').css('color','white');
				$('#carLink').css('color','white');
				$('#conLink').css('color','white');
				$('#eIns').hide();
				$('#inno').hide();
				$('#career').hide();
				$('#cont').hide();
				$('#serv').hide();
				$('#team').show();
				$('#team').css('opacity','1');
				$('#purple').css('opacity', '1');				
				$('#purple').css('background-color', '#8984AA');
				$('#main1').css('background-image','none');
			});
			
			$('#eInsLink').click(function(){
				$('#eInsLink').css('color','black');
				$('#teamLink').css('color','white');
				$('#servLink').css('color','white');
				$('#innoLink').css('color','white');
				$('#carLink').css('color','white');
				$('#conLink').css('color','white');				
				$('#serv').hide();
				$('#team').hide();
				$('#inno').hide();
				$('#career').hide();
				$('#cont').hide();
				$('#eIns').show();
				$('#purple').css('opacity', '1');
				$('#purple').css('background-color', '#8984AA');
				$('#main1').css('background-image','none');
			});
			
			$('#innoLink').click(function(){
				$('#innoLink').css('color','black');
				$('#teamLink').css('color','white');
				$('#eInsLink').css('color','white');
				$('#servLink').css('color','white');				
				$('#carLink').css('color','white');
				$('#conLink').css('color','white');				
				$('#serv').hide();
				$('#team').hide();
				$('#eIns').hide();				
				$('#career').hide();
				$('#cont').hide();
				$('#inno').show();
				$('#purple').css('opacity', '1');
				$('#purple').css('background-color', '#8984AA');
				$('#main1').css('background-image','none');
			});				
			
			$('#carLink').click(function(){
				$('#carLink').css('color','black');
				$('#teamLink').css('color','white');
				$('#innoLink').css('color','white');
				$('#eInsLink').css('color','white');
				$('#servLink').css('color','white');				
				$('#conLink').css('color','white');				
				$('#serv').hide();
				$('#team').hide();
				$('#eIns').hide();
				$('#inno').hide();
				$('#cont').hide();
				$('#career').show();
				$('#purple').css('opacity', '1');
				$('#purple').css('background-color', '#8984AA');
				$('#main1').css('background-image','none');
			});
			
			$('#conLink').click(function(){
				$('#conLink').css('color','black');
				$('#teamLink').css('color','white');
				$('#carLink').css('color','white');
				$('#innoLink').css('color','white');
				$('#eInsLink').css('color','white');
				$('#servLink').css('color','white');				
				$('#serv').hide();
				$('#team').hide();
				$('#eIns').hide();
				$('#inno').hide();
				$('#career').hide();
				$('#cont').show();
				$('#purple').css('opacity', '1');
				$('#purple').css('background-color', '#8984AA');
				$('#main1').css('background-image','none');
			});
			
			$('#lcap').click(function(){		
				$('#mcap').toggle();				
				$('#lcapText').toggle();
				if(i % 2 == 0){
					$('#lcap').css('background', 'none');
					i++;
					}
				else{
					$('#lcap').css('background', 'rgba(128, 128, 128, 0.5)');
					i--;
				}
								
			});
			
			$('#mcap').click(function(){						
				$('#lcap').toggle();								
				$('#mcapText').toggle();				
				if(j % 2 == 0){
					$('#mcap').css('background', 'none');
					j++;
					}
				else{
					$('#mcap').css('background', 'rgba(128, 128, 128, 0.5)');
					j--;
				}				
			});
					
		/*eInsight*/
			
			$('#c1').click(function(){
				$('#text').toggle();
				$('#imgStr1').toggle();
				$('#tabStr1').toggle();				
			});
						
			$('#imgStr1').click(function(){				
				$('#text').toggle();
				$('#imgStr1').toggle();
				$('#tabStr1').toggle();				
			});
			
			$('#c2').click(function(){
				$('#text').toggle();
				$('#imgStr2').toggle();
				$('#tabStr2').toggle();
			});			
			
			$('#imgStr2').click(function(){								
				$('#imgStr2').hide();
				$('#tabStr2').hide();				
				$('#text').show();
			});
			
			$('#c3').click(function(){				
				$('#text').toggle();
				$('#imgStr3').toggle();
				$('#tabStr3').toggle();
			});		
			
			$('#imgStr3').click(function(){
				$('#text').toggle();
				$('#imgStr3').toggle();
				$('#tabStr3').toggle();
			});
			
			/* contact */
			
			$('form').submit(function(){
					
					if($("input[name='nameF']").val() == ""){
						$("#report").text("Name must be filled.");
						$("input[name='nameF']").focus();
						return false;
					}
															
					var email;
					email=$("input[name='emailF']").val();
					if(email==""){
						$("#report").text("E-mail must be filled.");
						$("input[name='emailF']").focus();
						return false;
					}
					
					//regularni izraz za proveru email-a
					var emailRegex = new RegExp(/^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)$/i);
					
					if(!email.match(emailRegex)){
						$("#report").text("E-mail address is not valid.");
						return false;						
					}
					
					var company;
					company=$("input[name='companyF']").val();
					if(company==""){
						$("#report").text("Company name must be filled.");
						$("input[name='companyF']").focus();
						return false;
					}			
					
				});			
		});