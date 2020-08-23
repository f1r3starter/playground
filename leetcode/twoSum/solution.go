func twoSum(nums []int, target int) []int {
	h := make(map[int]int)
	for i := 0; i < len(nums); i++ {
		ni := target - nums[i]
		prev, found := h[ni]
		if found {
			return []int{prev, i}
		}

		h[nums[i]] = i
	}

	return []int{0, 0}
}