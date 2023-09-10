#자료 구조의 변경
menu ={"커피","우유","쥬스"}
print(menu)
print(menu , type(menu)) #{}로 묶으면 set
menu = list(menu) #list로 변환 시킨것
print(menu, type(menu)) #list로 묶으면 []
menu = tuple(menu) #
print (menu , type(menu))#tuple로 묶으면 ()

menu = set(menu)
print(menu ,type(menu))

from random import * #random을 import해오고
# lst = [1,2,3,4,5]
# shuffle(lst) # shuffle로 섞고 
# print(lst)
# print(sample(lst,1)) #섞은 리스트중 1개를 뽑는다. 와 문법은 이게 간단하긴 하네

#lst =[1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20]
lst = range(1,11)
lst = list(lst) #->이런식으로 list로 변환하면 된다 배운거 잖아? 
print(lst)
shuffle(lst)
Shuff =(sample(lst,4))  #sample함수는 리스트중 하나를 샘플로 뽑는 함수 개간단 
print(Shuff)

# print('--당첨자 발표-- \n 치킨 당첨차 :'+str(Shuff[0])+'\n'
#       '커피당첨자 :'+str(Shuff[1:])+'\n'+
#       '--축하합니다.')  내가 푼 문제

print('치킨당첨자 : {}'.format(Shuff[0]))
print('커피당첨차 : {}'.format(Shuff[1:]))
#위에껀 출제가 만든 정답

