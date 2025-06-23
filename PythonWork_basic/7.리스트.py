#리스트[] 자바스크립트의 배열과 휴사

subway = ["유재석","조세호","박명수"]
print(subway)
print(subway.index("박명수")) # 박명수의 인덱스값을 추가 
subway.append("하하")
print(subway) 
subway.insert(1,"정형돈") #정현돈을 인덱스 1번 위치에 넣는다는 의미
print(subway)
print(subway.pop()) #리스트에서 빼내기 / 리스트의 뒤에서 하나씩 빼는것 
print(subway)
print(subway.count("유재석")) #유재석이 몇명 들었는지
num_list = [10,4,1,6,2]
num_list.sort() # 순서대로 정렬하는것임
print(num_list)
#뒤집기
num_list.reverse()
print(num_list)
num_list.clear() # 리스트 값 지우기
num_list2 = [1,4,5,33,88,77]
mix_list =['조세호',20,True]
num_list2.extend(mix_list) # 리스트 합치기
print(num_list)

print([subway[0]])

city =['안양시','수원시','충주시','안성시','의정부시']
city.sort()

def roof():
     for place in city :
        print('내가 가봤던 도시는 ' + place + ' 입니다.')


##roof()
