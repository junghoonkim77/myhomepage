#리스트[] 자바스크립트의 배열과 휴사

subway = ["유재석","조세호","박명수"]
print(subway)
print(subway.index("박명수")) # 박명수의 인덱스값을 추가 
subway.append("하하")
print(subway) 
subway.insert(1,"정형돈")
print(subway)
print(subway.pop()) #리스트에서 빼내기
print(subway)
print(subway.count("유재석")) #유재석이 몇명 들었는지
num_list = [10,4,1,6,2]
num_list.sort()
print(num_list)
#뒤집기
num_list.reverse()
print(num_list)
#num_list.clear() 리스트 값 지우기
mix_list =['조세호',20,True]
num_list.extend(mix_list) # 리스트 합치기
print(num_list)



